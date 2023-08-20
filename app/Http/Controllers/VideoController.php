<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Comment;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $category = $request->input('category');

        return view('pages.front.video', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.channel.video.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $randomString = Str::random(16);
        $user = Auth::user();

        $myChannelId = Channel::where('user_id', $user->id)->value('id');

        $video = new Video();
        $video->channel_id = $myChannelId;
        $video->title = $request->input('title');
        $video->url = $randomString;
        $video->duration = $request->input('duration');
        $video->format = $request->input('format');
        $video->category = $request->input('category');
        $video->visibility = $request->input('visibility');
        $video->description = $request->input('description');

        $videoFileName = 'videos/' . $request->file('video')->hashName();
        $thumbnailFileName = 'thumbnails/' . $request->file('thumbnail')->hashName();

        $video->video = $videoFileName;
        $video->thumbnail = $thumbnailFileName;
        $video->save();

        // Store the video and thumbnail files in the storage disk under their respective directories
        $request->file('video')->storeAs('public', $videoFileName);
        $request->file('thumbnail')->storeAs('public', $thumbnailFileName);

        Alert::toast('Add new video successfully!', 'success', ['icon' => 'success']);

        return redirect()->route('mychannel.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($url)
    {
        $video = Video::where('url', $url)->first();

        $channel = Channel::join('users', 'users.id', 'channels.user_id', 'channels.id')->join('videos', 'videos.channel_id', 'channels.id')->where('videos.url', $url)->first();

        $otherVideo = Video::join('channels', 'channels.id', 'videos.channel_id')
            ->join('users', 'users.id', 'channels.user_id')
            ->where('visibility', 'Public')
            ->inRandomOrder()
            ->get();

        $url = route('coins.create', ['v' => $video->id, 'c' => $channel->id]);
        $qrCode = QrCode::size(150)->generate($url);

        if ($video) {
            if (Auth::user()) {
                $myChannel = Channel::where('user_id', Auth::user()->id)->first();
                $video->refresh(); // Retrieve the latest data from the database
                $video->increment('views');

                return view('pages.front.detail-video', compact('video', 'otherVideo', 'channel', 'qrCode', 'url', 'myChannel'));
            } else {
                return view('pages.front.detail-video', compact('video', 'otherVideo', 'channel', 'qrCode', 'url'));
            }
            dd("not found");
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        return view('pages.channel.video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);
        $video->refresh();

        // Store the original video and thumbnail paths
        $originalVideo = $video->video;
        $originalThumbnail = $video->thumbnail;

        $video->title = $request->input('title');
        $video->duration = $request->input('duration');
        $video->format = $request->input('format');
        $video->category = $request->input('category');
        $video->visibility = $request->input('visibility');
        $video->description = $request->input('description');

        // Check if a new video file is uploaded
        if ($request->hasFile('video')) {
            // Remove the original video file
            if ($originalVideo) {
                Storage::delete('public/' . $originalVideo);
            }

            $videoFile = $request->file('video');
            $videoPath = $videoFile->store('videos', 'public');
            $video->video = $videoPath;
        }

        // Check if a new thumbnail file is uploaded
        if ($request->hasFile('thumbnail')) {
            // Remove the original thumbnail file
            if ($originalThumbnail) {
                Storage::delete('public/' . $originalThumbnail);
            }

            $thumbnailFile = $request->file('thumbnail');
            $thumbnailPath = $thumbnailFile->store('thumbnails', 'public');
            $video->thumbnail = $thumbnailPath;
        }

        $video->save();

        Alert::toast('Update video successfully!', 'success', ['icon' => 'success']);

        return redirect()->route('mychannel.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);

        // Delete the video file from the storage disk
        Storage::delete('public/' . $video->video);

        // Delete the thumbnail file from the storage disk
        Storage::delete('public/' . $video->thumbnail);

        // Delete the video record from the database
        $video->delete();

        Alert::toast('Delete video successfully!', 'success', ['icon' => 'success']);

        return redirect()->back();
    }

    public function incrementViews(Video $video)
    {
        $video->views()->create();

        return redirect()->back();
    }
}

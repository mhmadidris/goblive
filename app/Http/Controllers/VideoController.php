<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::join('channels', 'channels.id', '=', 'videos.channel_id')->where('visibility', 'Public')->inRandomOrder()->get();

        return view('pages.front.video')->with('videos', $videos);
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

        $myChannelId = Channel::where('user_id', Auth::user()->id)->value('id');

        $video = new Video();
        $video->channel_id = $myChannelId;
        $video->title = $request->input('title');
        $video->url = $randomString;
        $video->duration = $request->input('duration');
        $video->format = $request->input('format');
        $video->video = 'videos/' . $request->file('video')->hashName();
        $video->thumbnail = 'thumbnails/' . $request->file('thumbnail')->hashName();
        $video->category = $request->input('category');
        $video->visibility = $request->input('visibility');
        $video->description = $request->input('description');
        $video->save();

        // Store the video file in the storage disk under the 'videos' directory
        $request->file('video')->store('public/videos');

        // Store the thumbnail file in the storage disk under the 'thumbnails' directory
        $request->file('thumbnail')->store('public/thumbnails');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($url)
    {
        $video = Video::where('url', $url)->first();

        if ($video) {
            $video->refresh(); // Retrieve the latest data from the database
            $video->increment('views');

            return view('pages.front.detail-video', compact('video'));
        } else {
            // Handle the case when the video is not found
            dd("not found");
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        //
    }

    public function incrementViews(Video $video)
    {
        $video->views()->create();

        return redirect()->back();
    }
}

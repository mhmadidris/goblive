<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Monarobase\CountryList\CountryList;
use RealRashid\SweetAlert\Facades\Alert;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myChannel = Channel::where('user_id', Auth::user()->id)->first();

        $countryList = new CountryList();
        $countries = $countryList->getList();

        $latestUpload = Video::join('channels', 'channels.id', 'videos.channel_id')
            ->join('users', 'users.id', 'channels.user_id')
            ->select('videos.*', 'users.name as channel_name', 'channels.*')
            ->where('videos.visibility', 'Public')
            ->where('videos.channel_id', $myChannel->id)
            ->orderBy('videos.created_at', 'ASC')
            ->take(6)
            ->get();

        $popularVideos = Video::join('channels', 'channels.id', 'videos.channel_id')
            ->join('users', 'users.id', 'channels.user_id')
            ->select('videos.*', 'users.name as channel_name', 'channels.*')
            ->where('videos.visibility', 'Public')
            ->where('videos.channel_id', $myChannel->id)
            ->orderBy('videos.views', 'ASC')
            ->take(6)
            ->get();

        return view('pages.channel.my-channel')->with('myChannel', $myChannel)
            ->with('latestUpload', $latestUpload)
            ->with('popularVideos', $popularVideos)
            ->with('countries', $countries);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($username)
    {
        $channel = Channel::join('users', 'users.id', 'channels.user_id')->where('channels.username', $username)->first();

        $latestUpload = Video::join('channels', 'channels.id', 'videos.channel_id')
            ->join('users', 'users.id', 'channels.user_id')
            ->select('videos.*', 'users.name as channel_name', 'channels.*')
            ->where('videos.visibility', 'Public')
            ->where('videos.channel_id', $channel->id)
            ->orderBy('videos.created_at', 'ASC')
            ->take(6)
            ->get();

        $popularVideos = Video::join('channels', 'channels.id', 'videos.channel_id')
            ->join('users', 'users.id', 'channels.user_id')
            ->select('videos.*', 'users.name as channel_name', 'channels.*')
            ->where('videos.visibility', 'Public')
            ->where('videos.channel_id', $channel->id)
            ->orderBy('videos.views', 'ASC')
            ->take(6)
            ->get();

        return view('pages.front.channel.detail-channel', compact('channel', 'latestUpload', 'popularVideos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Channel $channel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Channel $channel, $id)
    {
        // Find the channel based on the given ID
        $channel = Channel::findOrFail($id);

        // Validate the form data
        $validatedData = $request->validate([
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('channels')->ignore($channel->id),
            ],
            'bio' => 'nullable|string',
            'header' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update the channel data
        $channel->username = $validatedData['username'];

        // Check if the bio field is not null before updating
        if ($validatedData['bio'] !== null) {
            $channel->bio = $validatedData['bio'];
        }

        if ($request->has('lokasi')) {
            $channel->lokasi = $request->input('lokasi');
        }

        // Handle the header file
        if ($request->hasFile('header')) {
            // Delete the existing header file if it exists
            $deleteHeader = storage_path('app/public/' . $channel->header);
            File::delete($deleteHeader);

            // Store the new header file
            $channel->header = $request->file('header')->store('headers', 'public');
        }

        // Handle the avatar file
        if ($request->hasFile('avatar')) {
            // Delete the existing avatar file if it exists
            $deleteAvatar = storage_path('app/public/' . $channel->avatar);
            File::delete($deleteAvatar);

            // Store the new avatar file
            $channel->avatar = $request->file('avatar')->store('avatars', 'public');
        }

        // Save the updated channel
        $channel->save();

        // Find the associated user
        $user = User::findOrFail($channel->user_id);

        // Update the user's name
        $user->name = $request->input('name');

        // Save the updated user
        $user->save();

        Alert::toast('Update channel successfully!', 'success', ['icon' => 'success']);

        // Redirect or return a response
        return redirect()->back()->with('success', 'Channel and user updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Channel $channel)
    {
        //
    }

    public function myVideos(Request $request)
    {
        $category = $request->input('category');

        $countryList = new CountryList();
        $countries = $countryList->getList();

        $myChannel = Channel::where('user_id', Auth::user()->id)->first();

        return view('pages.channel.my-video', compact('category', 'myChannel', 'countries'));
    }


    public function myAbout()
    {
        $myChannel = Channel::where('user_id', Auth::user()->id)->first();

        $countryList = new CountryList();
        $countries = $countryList->getList();

        $countViews = Video::join('channels', 'channels.id', 'videos.channel_id')
            ->join('users', 'users.id', 'channels.user_id')
            ->select('videos.*', 'users.name as channel_name', 'channels.*')
            ->where('videos.channel_id', $myChannel->id)
            ->get();

        $viewCount = $countViews->sum('views');

        return view('pages.channel.my-about', compact('myChannel', 'viewCount', 'countries'));
    }

    public function channelVideos(Request $request, $username)
    {
        $category = $request->input('category');

        $channel = Channel::join('users', 'users.id', 'channels.user_id')->where('channels.username', $username)->first();

        return view('pages.front.channel.detail-video', compact('category', 'channel'));
    }

    public function channelAbout($username)
    {
        $channel = Channel::join('users', 'users.id', 'channels.user_id')->where('channels.username', $username)->first();

        $countViews = Video::join('channels', 'channels.id', 'videos.channel_id')
            ->join('users', 'users.id', 'channels.user_id')
            ->select('videos.*', 'users.name as channel_name', 'channels.*')
            ->where('videos.channel_id', $channel->id)
            ->get();

        $viewCount = $countViews->sum('views');

        return view('pages.front.channel.detail-about', compact('channel', 'viewCount'));
    }
}

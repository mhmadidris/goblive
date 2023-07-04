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

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myChannel = Channel::where('user_id', Auth::user()->id)->first();
        // $myVideo = Video::where('channel_id', $myChannel->id)->orderBy('created_at', 'DESC')->get();

        return view('pages.channel.my-channel')->with('myChannel', $myChannel);
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
    public function show(Channel $channel)
    {
        dd("asas");
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
}

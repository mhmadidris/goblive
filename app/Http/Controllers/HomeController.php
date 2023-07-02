<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Google_Client;
use Google_Service_YouTube;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Create a new instance of the Google_Client
        $client = new Google_Client();
        $client->setApplicationName('Your Application Name');
        $client->setDeveloperKey(env('YOUTUBE_API_KEY')); // Replace with your own API key

        // Create a new instance of the Google_Service_YouTube
        $youtube = new Google_Service_YouTube($client);

        // Set the parameters for the API request
        $params = [
            'part' => 'snippet',
            'eventType' => 'live',
            'type' => 'video',
            'maxResults' => 1, // Retrieve only one video
            'q' => 'gaming streamer', // Replace 'gaming streamer' with the desired gaming streamer's name or channel name
            'regionCode' => 'ID', // Set the region code to 'ID' for Indonesia
        ];

        // Call the API to fetch the livestreams data
        $response = $youtube->search->listSearch('id', $params);

        $livestreams = $response->getItems();

        // Retrieve the channel details and channel avatar
        $channelAvatars = [];
        foreach ($livestreams as $livestream) {
            $channelId = $livestream->snippet->channelId;
            $channel = $youtube->channels->listChannels('snippet', ['id' => $channelId]);
            $channelAvatar = $channel->getItems()[0]->snippet->thumbnails->default->getUrl();
            $channelAvatars[$channelId] = $channelAvatar;
        }

        // Fetch other video categories
        $latestVideos = Video::join('channels', 'channels.id', 'videos.channel_id')
            ->join('users', 'users.id', 'channels.user_id')
            ->select('videos.*', 'users.name as channel_name')
            ->where('videos.visibility', 'Public')
            ->orderBy('videos.created_at', 'ASC')
            ->take(6)
            ->get();

        $mobileVideos = Video::join('channels', 'channels.id', 'videos.channel_id')
            ->join('users', 'users.id', 'channels.user_id')
            ->select('videos.*', 'users.name as channel_name')
            ->where('videos.visibility', 'Public')
            ->where('category', 'Mobile')
            ->orderBy('videos.created_at', 'ASC')
            ->take(6)
            ->get();

        $consoleVideos = Video::join('channels', 'channels.id', 'videos.channel_id')
            ->join('users', 'users.id', 'channels.user_id')
            ->select('videos.*', 'users.name as channel_name')
            ->where('videos.visibility', 'Public')
            ->where('category', 'Console')
            ->orderBy('videos.created_at', 'ASC')
            ->take(6)
            ->get();

        $pcVideos = Video::join('channels', 'channels.id', 'videos.channel_id')
            ->join('users', 'users.id', 'channels.user_id')
            ->select('videos.*', 'users.name as channel_name')
            ->where('videos.visibility', 'Public')
            ->where('category', 'PC')
            ->orderBy('videos.created_at', 'ASC')
            ->take(6)
            ->get();

        return view('pages.front.home', compact('latestVideos', 'mobileVideos', 'consoleVideos', 'pcVideos', 'livestreams', 'channelAvatars'));
    }
}

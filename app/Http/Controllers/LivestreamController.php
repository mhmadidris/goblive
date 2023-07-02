<?php

namespace App\Http\Controllers;

use Google_Client;
use Google_Service_YouTube;
use Illuminate\Http\Request;

class LivestreamController extends Controller
{
    public function retrieveLiveStreams()
    {
        // $client = new Google_Client();
        // $client->setApplicationName('YouTube Live Streams');
        // $client->setDeveloperKey(env('YOUTUBE_API_KEY')); // Replace with your YouTube API key
        // $youtube = new Google_Service_YouTube($client);

        // $response = $youtube->liveBroadcasts->listLiveBroadcasts('snippet', [
        //     'broadcastType' => 'all',
        //     'maxResults' => 10, // Adjust the number of results as needed
        //     'mine' => true,
        // ]);

        // $liveStreams = $response->getItems();

        // // Process the retrieved live streams as needed

        return view('pages.front.live');
    }
}

<?php

namespace App\Http\Controllers;

use Google_Client;
use Google_Service_YouTube;

class YoutubeController extends Controller
{
    public function getLivestreams()
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
            'maxResults' => 10, // Adjust the number of results as per your requirement
            'q' => 'gaming streamer', // Replace 'game' with the game category you want to filter
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

        // Do something with the livestreams and channel details, such as passing them to a view
        return view('pages.front.livestream', compact('livestreams', 'channelAvatars'));
    }

    public function show($videoId)
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
            'id' => $videoId,
        ];

        // Call the API to fetch the livestream details
        $response = $youtube->videos->listVideos('snippet', $params);

        $livestream = $response->getItems()[0];

        // Retrieve the channel details and channel avatar
        $channelId = $livestream->snippet->channelId;
        $channel = $youtube->channels->listChannels('snippet, statistics', ['id' => $channelId]);
        $channelAvatar = $channel->getItems()[0]->snippet->thumbnails->default->getUrl();
        $subscriberCount = $channel->getItems()[0]->statistics->subscriberCount;

        // Retrieve the category details
        $categoryId = $livestream->snippet->categoryId;
        $category = $youtube->videoCategories->listVideoCategories('snippet', ['id' => $categoryId]);
        $categoryName = $category->getItems()[0]->snippet->title;

        // Check if comments are enabled for the video
        $commentsEnabled = $livestream->snippet->canComment;
        $comments = [];

        // Retrieve comments only if they are enabled for the video
        if ($commentsEnabled) {
            // Retrieve comments for the video
            $commentsResponse = $youtube->commentThreads->listCommentThreads('snippet', ['videoId' => $videoId]);
            $comments = $commentsResponse->getItems();
        }

        // Check if live chat is enabled for the video
        $liveChatEnabled = $livestream->snippet->isLiveChatEnabled;
        $liveChatMessages = [];

        // Retrieve live chat messages only if live chat is enabled for the video
        if ($liveChatEnabled) {
            // Retrieve live chat messages for the video
            $liveChatResponse = $youtube->liveChatMessages->listLiveChatMessages('snippet', ['liveChatId' => $livestream->liveStreamingDetails->activeLiveChatId]);
            $liveChatMessages = $liveChatResponse->getItems();
        }

        // Do something with the livestream details, channel avatar, subscriber count, category name, comments, and live chat messages,
        // such as passing them to a view
        return view('pages.front.detail-livestream', compact('livestream', 'channelAvatar', 'subscriberCount', 'categoryName', 'comments', 'liveChatMessages'));
    }
}

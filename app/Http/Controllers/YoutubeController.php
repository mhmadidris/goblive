<?php

namespace App\Http\Controllers;

use Google_Client;
use Google_Service_YouTube;

class YoutubeController extends Controller
{
    public function getLiveStream()
    {
        $client = new Google_Client();
        $client->setClientId(env('YOUTUBE_CLIENT_ID'));
        $client->setClientSecret(env('YOUTUBE_CLIENT_SECRET'));
        $client->setRedirectUri(env('YOUTUBE_REDIRECT_URI'));
        $client->addScope(Google_Service_YouTube::YOUTUBE_READONLY);

        // Check if the access token exists in the session
        if ($accessToken = session('youtube_access_token')) {
            $client->setAccessToken($accessToken);
        } else {
            // If the access token doesn't exist, redirect to the authorization URL
            return redirect()->to($client->createAuthUrl());
        }

        // Create YouTube service
        $youtube = new Google_Service_YouTube($client);

        // Call the API to get the livestream data
        $response = $youtube->liveStreams->listLiveStreams('snippet', array(
            'mine' => true,
        ));

        $livestreams = $response->getItems();

        // Do something with the livestreams data

        return view('pages.front.live', compact('livestreams'));
    }

    public function youtubeCallback()
    {
        $client = new Google_Client();
        $client->setClientId(env('YOUTUBE_CLIENT_ID'));
        $client->setClientSecret(env('YOUTUBE_CLIENT_SECRET'));
        $client->setRedirectUri(env('YOUTUBE_REDIRECT_URI'));
        $client->addScope(Google_Service_YouTube::YOUTUBE_READONLY);

        // Check if the code parameter is present in the request
        if (request('code')) {
            // Exchange the authorization code for an access token
            $accessToken = $client->fetchAccessTokenWithAuthCode(request('code'));
            $client->setAccessToken($accessToken);

            // Store the access token in the session for future use
            session(['youtube_access_token' => $accessToken]);

            // Redirect back to the original route
            return redirect()->route('youtube.livestream');
        }

        // Redirect to the homepage if the code parameter is not present
        return redirect()->url('/');
    }
}

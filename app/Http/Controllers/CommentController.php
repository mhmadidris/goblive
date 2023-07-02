<?php

namespace App\Http\Controllers;

use Google_Service_YouTube_Comment;
use Google_Service_YouTube_CommentThread;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Retrieve the comment details from the form
        $livestreamId = $request->input('livestreamId');
        $commentText = $request->input('comment');

        // Create a new instance of the Google_Client
        $client = new Google_Client();
        $client->setApplicationName('Your Application Name');
        $client->setDeveloperKey(env('YOUTUBE_API_KEY')); // Replace with your own API key

        // Create a new instance of the Google_Service_YouTube
        $youtube = new Google_Service_YouTube($client);

        // Create a new comment thread
        $comment = new Google_Service_YouTube_CommentThread();
        $comment->setSnippet(new Google_Service_YouTube_CommentThreadSnippet());
        $commentSnippet = $comment->getSnippet();
        $commentSnippet->setChannelId('YOUR_CHANNEL_ID'); // Replace with your own channel ID
        $commentSnippet->setVideoId($livestreamId);
        $commentSnippet->setTopLevelComment(new Google_Service_YouTube_Comment());
        $commentSnippet->getTopLevelComment()->setSnippet(new Google_Service_YouTube_CommentSnippet());
        $commentSnippet->getTopLevelComment()->getSnippet()->setTextOriginal($commentText);

        // Insert the comment thread
        $youtube->commentThreads->insert('snippet', $comment);

        // Redirect back to the livestream page
        return redirect()->back();
    }
}

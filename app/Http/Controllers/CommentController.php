<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Comment;
use Google_Service_YouTube_Comment;
use Google_Service_YouTube_CommentThread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $channelId = Channel::where('user_id', Auth::user()->id)->value('id');

        // Validate the request data
        $validatedData = $request->validate([
            'comment' => 'string',
            'video_id' => 'required', // Add the validation rule for video_id
        ]);

        // Create a new comment
        $comment = new Comment();
        $comment->channel_id = $channelId;
        $comment->video_id = $request->video_id; // Set the value for video_id
        $comment->comment = $validatedData['comment'];
        // Set other properties of the comment if necessary

        // Save the comment
        $comment->save();

        // Return a JSON response if desired
        return response()->json(['message' => 'Comment stored successfully']);
    }
}

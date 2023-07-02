<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
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

        return view('pages.front.home', compact('latestVideos', 'mobileVideos', 'consoleVideos', 'pcVideos'));
    }
}

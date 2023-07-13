<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Coin;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $videoId = $request->query('v');
        $channelId = $request->query('c');

        $myChannel = Channel::where('user_id', Auth::user()->id)->first();

        return view('pages.front.send-coin', compact(['videoId', 'channelId', 'myChannel']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $video = Video::where('channel_id', $request->channelId)->first();

        $fromChannel = Channel::where('user_id', Auth::user()->id)->first();

        $coins = Coin::create([
            'from_channel_id' => $fromChannel->id,
            'to_channel_id' => $request->channelId,
            'video_id' => $request->videoId,
            'coin' => $request->rangeCoins,
            'pesan' => $request->pesan ?? null
        ]);

        if ($coins) {
            $fromChannel->coin -= $request->rangeCoins;
            $fromChannel->save();

            $destinationChannel = Channel::find($request->channelId);
            $destinationChannel->coin += $request->rangeCoins;
            $destinationChannel->save();

            alert()->success('Success Title', 'Success Message');
            return redirect()->route('video.show', $video->url);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Coin $coin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coin $coin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coin $coin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coin $coin)
    {
        //
    }
}

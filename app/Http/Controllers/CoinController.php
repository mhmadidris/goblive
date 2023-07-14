<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Coin;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Monarobase\CountryList\CountryList;

class CoinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myChannel = Channel::where('user_id', Auth::user()->id)->first();

        $countryList = new CountryList();
        $countries = $countryList->getList();
        // $myVideo = Video::where('channel_id', $myChannel->id)->orderBy('created_at', 'DESC')->get();

        return view('pages.channel.my-history')->with('myChannel', $myChannel)->with('countries', $countries);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $videoId = $request->query('v');
        $channelId = $request->query('c');

        $myChannel = Channel::where('user_id', Auth::user()->id)->first();

        if ($channelId != $myChannel->id) {
            return view('pages.front.send-coin', compact(['videoId', 'channelId', 'myChannel']));
        } else {
            return abort(404);
        }
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
            'user_id' => Auth::user()->id,
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

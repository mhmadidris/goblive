<?php

namespace App\Http\Livewire;

use App\Models\Channel;
use App\Models\Coin;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class MyHistory extends Component
{
    use WithPagination;

    public function render()
    {
        $linkShop = Shop::where('user_id', Auth::user()->id)->firstOrNew();

        $channel = Channel::where('user_id', Auth::user()->id)->first();
        $history = Coin::join('videos', 'videos.id', 'coins.video_id')->select('videos.title', 'videos.category', 'videos.thumbnail', 'coins.*')->where('from_channel_id', $channel->id)->orWhere('to_channel_id', $channel->id)->orderBy('coins.created_at', 'DESC')->paginate(6);

        return view('livewire.my-history', compact(['history', 'channel', 'linkShop']));
    }
}

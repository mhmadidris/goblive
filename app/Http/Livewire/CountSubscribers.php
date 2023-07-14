<?php

namespace App\Http\Livewire;

use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CountSubscribers extends Component
{
    public $channelId;
    public $countSubs;

    protected $listeners = ['refreshCountSubscribers' => 'refreshCountSubscribers'];

    public function mount($channelId)
    {
        $this->channelId = $channelId;
        $this->refreshCountSubscribers();
    }

    public function refreshCountSubscribers()
    {
        $this->countSubs = Subscription::where('channel_id', $this->channelId)->count();
    }

    public function render()
    {
        return view('livewire.count-subscribers', [
            'countSubs' => $this->countSubs,
        ]);
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Subscription;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class Subscriber extends Component
{
    public $channelId;
    public $isSubscribed;
    public $countSubs;

    public function mount($channelId)
    {
        $this->channelId = $channelId;
        $this->refreshIsSubscribed();
    }

    public function subscribe()
    {
        Subscription::create([
            'user_id' => Auth::user()->id,
            'channel_id' => $this->channelId,
        ]);

        $this->refreshIsSubscribed();
        $this->showToast('success', 'Subscribed successfully!');
        $this->emit('refreshCountSubscribers');
    }

    public function unsubscribe()
    {
        Subscription::where('user_id', Auth::user()->id)
            ->where('channel_id', $this->channelId)
            ->delete();

        $this->refreshIsSubscribed();
        $this->showToast('success', 'Unsubscribed successfully!');
        $this->emit('refreshCountSubscribers');
    }

    public function refreshIsSubscribed()
    {
        $this->isSubscribed = Subscription::where('user_id', Auth::user()->id)
            ->where('channel_id', $this->channelId)
            ->exists();
    }

    public function updated($propertyName)
    {
        if ($propertyName === 'isSubscribed') {
            if ($this->isSubscribed) {
                $this->emit('refreshCountSubscribers');
            } else {
                $this->emit('refreshCountSubscribers');
            }
        }
    }

    public function showToast($type, $message)
    {
        $this->dispatchBrowserEvent('showToast', [
            'type' => $type,
            'message' => $message,
        ]);
    }

    public function render()
    {
        return view('livewire.subscriber');
    }
}

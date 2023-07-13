<?php

namespace App\Http\Livewire;

use App\Models\Channel;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class ChannelVideo extends Component
{
    use WithPagination;

    public $category;
    public $search;
    public $channel;

    public function render()
    {
        $channel = Channel::where('username', $this->channel->username)->first();
        $query = Video::where('channel_id', $this->channel->id)->orderBy('created_at', 'DESC');

        if ($this->category) {
            $query->where('category', $this->category);
        }

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'LIKE', '%' . $this->search . '%');
            });
        }

        $videos = $query->paginate(8);

        $videos->appends([
            'category' => $this->category,
            'search' => $this->search,
        ]);

        return view('livewire.channel-video', [
            'videos' => $videos,
        ]);
    }
}

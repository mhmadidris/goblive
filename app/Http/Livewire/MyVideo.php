<?php

namespace App\Http\Livewire;

use App\Models\Channel;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class MyVideo extends Component
{
    use WithPagination;

    public $category;
    public $search;
    public $myChannel;

    public function render()
    {
        $myChannel = Channel::where('user_id', Auth::user()->id)->first();
        $query = Video::where('channel_id', $myChannel->id)->orderBy('created_at', 'DESC');

        if ($this->category) {
            $query->where('category', $this->category);
        }

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('games_name', 'LIKE', '%' . $this->search . '%');
            });
        }

        $videos = $query->paginate(12);

        $videos->appends([
            'category' => $this->category,
            'search' => $this->search,
        ]);

        return view('livewire.my-video', [
            'videos' => $videos,
        ]);
    }
}

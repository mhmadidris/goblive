<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Video;

class VideosComponent extends Component
{
    use WithPagination;

    public $category;
    public $search;

    public function render()
    {
        $query = Video::join('channels', 'channels.id', '=', 'videos.channel_id')
            ->where('visibility', 'Public');

        if ($this->category) {
            $query->where('category', $this->category);
        }

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'LIKE', '%' . $this->search . '%');
            });
        }

        if (!$this->category && !$this->search) {
            $query->inRandomOrder();
        }

        $videos = $query->paginate(8);

        $videos->appends([
            'category' => $this->category,
            'search' => $this->search,
        ]);

        return view('livewire.videos-component', ['videos' => $videos]);
    }
}

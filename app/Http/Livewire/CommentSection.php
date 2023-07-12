<?php

namespace App\Http\Livewire;

use App\Models\Channel;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CommentSection extends Component
{
    public $video;
    public $comment;
    public $comments;

    protected $listeners = ['echo-private:comments,CommentAdded' => 'handleCommentAdded'];

    public function mount($video)
    {
        $this->video = $video;
        $this->refreshComments();
    }

    public function refreshComments()
    {
        $this->comments = Comment::select('comments.*', 'channels.created_at AS channel_created_at', 'channels.avatar AS channel_avatar', 'users.name')
            ->join('channels', 'channels.id', 'comments.channel_id')
            ->join('users', 'users.id', 'channels.user_id')
            ->where('video_id', $this->video->id)
            ->orderBy('comments.created_at', 'DESC')
            ->get();
        //dd($this->comments);
    }

    public function addComment()
    {
        $channelId = Channel::where('user_id', Auth::user()->id)->value('id');

        $this->validate([
            'comment' => 'required',
        ]);

        $newComment = Comment::create([
            'channel_id' => $channelId,
            'video_id' => $this->video->id,
            'comment' => $this->comment,
        ]);

        $this->emit('commentAdded', $newComment->id);

        $this->comment = '';
    }

    public function handleCommentAdded()
    {
        $this->refreshComments();
    }

    public function render()
    {
        return view('livewire.comment-section', [
            'comments' => $this->comments,
        ]);
    }
}

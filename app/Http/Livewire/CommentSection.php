<?php

namespace App\Http\Livewire;

use App\Models\Channel;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

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
        $this->comments = Comment::select('comments.*', 'channels.created_at AS channel_created_at', 'channels.avatar AS channel_avatar', 'users.name', 'channels.username')
            ->join('channels', 'channels.id', 'comments.channel_id')
            ->join('users', 'users.id', 'channels.user_id')
            ->where('video_id', $this->video->id)
            ->orderBy('comments.created_at', 'DESC')
            ->get();
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

        $this->showToast('success', 'Add new comment successfully!');
        $this->emit('commentAdded', $newComment->id);

        $this->comment = '';

        // Use JavaScript to reload the current page after adding the comment
        $this->dispatchBrowserEvent('refreshPage');
    }

    public function handleCommentAdded()
    {
        $this->refreshComments();
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
        return view('livewire.comment-section', [
            'comments' => $this->comments,
        ]);
    }
}

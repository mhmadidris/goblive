<div>
    <div class="d-flex flex-column-reverse">
        <div class="d-flex flex-column align-items-center gap-2" id="commentContainer" wire:poll.0000ms="refreshComments">
            <!-- Existing comments -->
            @if (!empty($comments))
                @foreach ($comments as $comment)
                    <div class="d-flex flex-row gap-2 w-100" id="comment-{{ $comment->id }}">
                        <img src="{{ asset('storage/' . $comment->channel_avatar) }}" alt="Avatar" class="rounded-circle"
                            style="width: 40px; height: 40px; border: 2px solid white;">
                        <div class="d-flex flex-column gap-1 w-100">
                            <div class="d-flex flex-row align-items-center justify-content-between">
                                <a href="{{ route('channel.show', $comment->username) }}" class="nav-link">
                                    <h6 class="fw-bold">{{ $comment->name }}</h6>
                                </a>
                                <h6 class="text-white fw-medium">
                                    {{ $comment->created_at->diffForHumans() }}</h6>
                            </div>
                            <p>{{ $comment->comment }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <h6 class="text-center">No comment available</h6>
            @endif
        </div>

        <div id="commentForm" class="mb-4">
            <form wire:submit.prevent="addComment" class="d-flex flex-row justify-content-between gap-2 w-100">
                <input type="hidden" name="video_id" class="form-control" autocomplete="off"
                    value="{{ $video->id }}">
                <input wire:model.defer="comment" type="text" name="comment" class="form-control"
                    placeholder="Type your comment" autocomplete="off">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('commentAdded', function(commentId) {
                // Scroll to the newly added comment
                const commentElement = document.getElementById('comment-' + commentId);
                if (commentElement) {
                    commentElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</div>

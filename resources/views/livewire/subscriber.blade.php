<div>
    @if ($isSubscribed)
        <form wire:submit.prevent="unsubscribe">
            @csrf
            <button type="submit" class="btn btn-danger rounded">Unsubscribe</button>
        </form>
    @else
        <form wire:submit.prevent="subscribe">
            @csrf
            <button type="submit" class="btn btn-primary rounded">Subscribe</button>
        </form>
    @endif
</div>

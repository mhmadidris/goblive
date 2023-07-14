<div>
    <div class="d-flex flex-column gap-2 mt-4">
        @foreach ($history as $item)
            <div class="card card-body text-black">
                <div class="d-flex flex-row justify-content-between">
                    <div class="d-flex flex-row gap-3">
                        <img class="rounded shadow-sm" src="{{ asset('storage/' . $item->thumbnail) }}" alt=""
                            style="width: 7.5rem; height: 6rem; object-fit: cover;">
                        <div class="d-flex flex-column gap-1">
                            <h3 class="fw-bold">{{ $item->title }}</h3>
                            <div class="d-flex align-items-center align-content-center gap-1">
                                <i class="fas fa-hashtag"></i>
                                <span class="fw-semibold">{{ $item->category }}</span>
                            </div>
                            @if ($item->pesan != null)
                                <span class="fw-semibold">{{ $item->pesan }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-between align-items-end">
                        @if ($item->user_id != Auth::user()->id)
                            <h4 class="fw-bold" style="color: green;">+{{ $item->coin }}</h4>
                        @elseif ($item->user_id == Auth::user()->id)
                            <h4 class="fw-bold" style="color: red;">-{{ $item->coin }}</h4>
                        @endif
                        <h6 class="text-muted fw-semibold" title="{{ $item->created_at }}">
                            {{ $item->created_at->diffForHumans() }}</h6>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex flex-row justify-content-end mt-2">
        {{ $history->links('livewire.pagination') }}
    </div>
</div>

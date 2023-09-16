<div>
    <div class="p-0 input-group rounded-pill shadow-sm my-3">
        <input class="form-control border-0 shadow-none rounded-start-pill custom-input-bg text-white px-3" type="text"
            wire:model="search" placeholder="Search video" id="example-search-input">
        <span class="input-group-append border-0">
            <div class="btn text-white rounded-end-pill ms-n5 custom-button-bg">
                <i class="fas fa-search"></i>
            </div>
        </span>
    </div>

    @if ($search != null)
        <h5 class="text-white my-3">Result of <strong>"{{ $search }}"</strong></h5>
    @endif

    <div class="row">
        @forelse ($videos as $item)
            <div class="col-md-3 mb-4">
                <div class="d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>{{ $item->duration }}</small>
                        </div>
                        @if ($item->visibility == 'Private')
                            <div class="px-2 py-1 position-absolute top-0 end-0 m-2 text-white rounded-circle shadow-sm"
                                style="background-color: red;" title="This private video">
                                <i class="fas fa-lock"></i>
                            </div>
                        @endif
                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="Thumbnail" class="rounded"
                            style="width: 100%; height: 10rem; object-fit: cover;">
                    </div>
                    <a href="{{ route('mychannel.video.show', $item->url) }}" class="nav-link">
                        <h5 class="fw-bold mt-2">{{ $item->title }}</h5>
                    </a>
                    <div class="d-flex align-items-center justify-content-between gap-2">
                        <a href="{{ route('mychannel.video.edit', $item->id) }}" class="btn btn-primary w-100">
                            <i class="fas fa-edit"></i>
                            Edit Video
                        </a>
                        <form action="{{ route('mychannel.video.destroy', $item->id) }}" method="POST"
                            id="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" style="background-color: red;"
                                onclick="confirmDelete(event)">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div style="min-height: 150vh;" class="d-flex flex-column justify-content-center align-items-center gap-2"
                style="opacity: 0.75;">
                <img style="width: 10rem;" src="{{ asset('images/no-video.png') }}" alt="video not found">
                <h4 class="fw-bold text-uppercase">Videos not yet available</h4>
            </div>
        @endforelse

        <div class="d-flex flex-row justify-content-end mt-2">
            {{ $videos->links('livewire.pagination') }}
        </div>
    </div>
</div>

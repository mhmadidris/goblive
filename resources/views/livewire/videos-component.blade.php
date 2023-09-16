<div>
    <style>
        .input-group {
            background: linear-gradient(180deg, #000000, #0e1111);
        }

        .custom-input-bg {
            background: rgb(65, 65, 73);
            background: radial-gradient(circle, rgba(65, 65, 73, 1) 0%, rgba(57, 57, 57, 1) 100%);
            color: white;
        }

        .custom-input-bg::placeholder {
            color: white;
        }

        .custom-button-bg {
            background: rgb(65, 65, 73);
            background: radial-gradient(circle, rgba(65, 65, 73, 1) 0%, rgba(57, 57, 57, 1) 100%);
        }

        .btn-color {
            background: rgb(65, 65, 73);
            background: radial-gradient(circle, rgba(65, 65, 73, 1) 0%, rgba(57, 57, 57, 1) 100%);
        }
    </style>

    <div class="d-flex flex-column text-white">
        <div class="d-flex flex-column justify-content-center align-items-center text-center">
            <h2 class="fw-bold" style="font-family: 'Black Ops One'; font-size: 2.5rem;">GOBLIVE</h2>
            <p class="mb-4">Get ready to explore, compete, and redefine what it means to be a hero. Step into the
                extraordinary, and let the games begin.</p>
        </div>


        <div class="d-flex flex-row gap-2 mb-3">
            <div class="p-0 input-group rounded-pill shadow-sm">
                <input class="form-control border-0 shadow-none rounded-start-pill custom-input-bg text-white px-3"
                    type="text" wire:model="search" placeholder="Search video" id="example-search-input">
                <span class="input-group-append border-0">
                    <div class="btn text-white rounded-end-pill ms-n5 custom-button-bg">
                        <i class="fas fa-search"></i>
                    </div>
                </span>
            </div>
        </div>
    </div>

    @if ($search != '')
        <h5 class="text-white">Result of <strong>"{{ $search }}"</strong></h5>
    @endif

    <div class="container" style="min-height: 100vh;">
        <div class="row">
            @forelse ($videos as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="d-flex flex-column text-white">
                        <a href="{{ route('video.show', $item->url) }}" class="nav-link">
                            <div class="position-relative">
                                <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                                    style="background-color: #353839;">
                                    <small>{{ $item->duration }}</small>
                                </div>
                                <img src="{{ asset('storage/' . $item->thumbnail) }}" class="rounded"
                                    style="width: 100%; height: 10rem; object-fit: cover;">
                            </div>
                            <h5 class="fw-bold mt-2">{{ ucfirst($item->title) }}</h5>
                        </a>
                        <div class="d-flex align-items-center gap-2">
                            <img src="{{ asset('storage/' . \App\Models\Channel::where('user_id', $item->user_id)->value('avatar')) }}"
                                class="rounded-circle" style="width: 35px; height: 35px;" alt="Avatar" />
                            <div class="d-flex flex-column">
                                <h6 class="m-0 fw-semibold">{{ ucfirst($item->name) }}</h6>
                                <small class="m-0 fw-medium">{{ number_format($item->views) }} views</small>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div style="min-height: 100vh;"
                    class="d-flex flex-column justify-content-center align-items-center gap-2" style="opacity: 0.75;">
                    <img style="width: 10rem;" src="{{ asset('images/no-video.png') }}" alt="video not found">
                    <h4 class="fw-bold text-uppercase">Videos not yet available</h4>
                </div>
            @endforelse

            <div class="d-flex flex-row justify-content-end">
                {{ $videos->links('livewire.pagination') }}
            </div>
        </div>
    </div>
</div>

@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column gap-4">
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-column w-50 text-white">
                <h1 class="fw-bold" style="font-size: 4rem;">Play, Compete, Follow Popular Streamers</h1>
                <p class="fw-bold" style="font-size: 1rem;">The best streamers gather to have a good time, be among us,
                    join
                    us!</p>
            </div>
            <div class="d-flex flex-column w-50 text-white">
                @foreach ($livestreams as $livestream)
                    <iframe width="560" height="315"
                        src="https://www.youtube.com/embed/{{ $livestream->id->videoId }}?autoplay=1&mute=1"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen class="rounded"></iframe>
                    <p class="fw-bold mt-2" style="font-size: 1rem;">The best streamers gather to have a good time, be among
                        us,
                        join us!</p>
                @endforeach
            </div>
        </div>

        {{-- Start Latest Videos --}}
        <div class="d-flex flex-column">
            <div class="d-flex flex-row justify-content-between align-content-center align-items-center text-white mb-3">
                <h4 class="fw-bold">Latest Videos</h4>
                {{-- <a href="{{ route('video.index') }}" class="btn btn-sm rounded-pill px-4 fw-semibold text-white"
                    style="background-color: #353839;">
                    See all
                </a> --}}
            </div>
            <div class="owl-carousel owl-theme">
                @foreach ($latestVideos as $itemLatest)
                    <div class="item d-flex flex-column text-white">
                        <div class="position-relative">
                            <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                                style="background-color: #353839;">
                                <small>{{ $itemLatest->duration }}</small>
                            </div>
                            <img src="{{ asset('storage/' . $itemLatest->thumbnail) }}" alt="Thumbnail" class="rounded"
                                style="width: 100%; height: 10rem; object-fit: cover;">
                        </div>
                        <a href="{{ route('video.show', $itemLatest->url) }}" class="nav-link">
                            <h5 class="fw-bold mt-2">{{ ucfirst($itemLatest->title) }}</h5>
                        </a>
                        <div class="d-flex align-items-center gap-2">
                            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                                style="width: 25px;" alt="Avatar" />
                            <h6 class="m-0 fw-semibold">{{ $itemLatest->channel_name }}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- End Latest Videos --}}

        {{-- Start Mobile Games Videos --}}
        <div class="d-flex flex-column">
            <div class="d-flex flex-row justify-content-between align-content-center align-items-center text-white mb-3">
                <h4 class="fw-bold">Mobile Games</h4>
                <a href="{{ route('video.index', ['category' => 'Mobile']) }}"
                    class="btn btn-sm rounded-pill px-4 fw-semibold text-white" style="background-color: #353839;">
                    See all
                </a>
            </div>
            <div class="owl-carousel owl-theme">
                @foreach ($mobileVideos as $itemMobile)
                    <div class="item d-flex flex-column text-white">
                        <div class="position-relative">
                            <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                                style="background-color: #353839;">
                                <small>{{ $itemMobile->duration }}</small>
                            </div>
                            <img src="{{ asset('storage/' . $itemMobile->thumbnail) }}" alt="Thumbnail" class="rounded"
                                style="width: 100%; height: 10rem; object-fit: cover;">
                        </div>
                        <a href="{{ route('video.show', $itemMobile->url) }}" class="nav-link">
                            <h5 class="fw-bold mt-2">{{ ucfirst($itemMobile->title) }}</h5>
                        </a>
                        <div class="d-flex align-items-center gap-2">
                            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                                style="width: 25px;" alt="Avatar" />
                            <h6 class="m-0 fw-semibold">{{ $itemMobile->channel_name }}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- End Mobile Games Videos --}}

        {{-- Start Console Games Videos --}}
        <div class="d-flex flex-column">
            <div class="d-flex flex-row justify-content-between align-content-center align-items-center text-white mb-3">
                <h4 class="fw-bold">Console Games</h4>
                <a href="{{ route('video.index', ['category' => 'Console']) }}"
                    class="btn btn-sm rounded-pill px-4 fw-semibold text-white" style="background-color: #353839;">
                    See all
                </a>
            </div>
            <div class="owl-carousel owl-theme">
                @foreach ($consoleVideos as $itemConsole)
                    <div class="item d-flex flex-column text-white">
                        <div class="position-relative">
                            <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                                style="background-color: #353839;">
                                <small>{{ $itemConsole->duration }}</small>
                            </div>
                            <img src="{{ asset('storage/' . $itemConsole->thumbnail) }}" alt="Thumbnail" class="rounded"
                                style="width: 100%; height: 10rem; object-fit: cover;">
                        </div>
                        <a href="{{ route('video.show', $itemConsole->url) }}" class="nav-link">
                            <h5 class="fw-bold mt-2">{{ ucfirst($itemConsole->title) }}</h5>
                        </a>
                        <div class="d-flex align-items-center gap-2">
                            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                                style="width: 25px;" alt="Avatar" />
                            <h6 class="m-0 fw-semibold">{{ $itemConsole->channel_name }}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- End Console Games Videos --}}

        {{-- Start PC Games Videos --}}
        <div class="d-flex flex-column">
            <div class="d-flex flex-row justify-content-between align-content-center align-items-center text-white mb-3">
                <h4 class="fw-bold">PC Games</h4>
                <a href="{{ route('video.index', ['category' => 'PC']) }}"
                    class="btn btn-sm rounded-pill px-4 fw-semibold text-white" style="background-color: #353839;">
                    See all
                </a>
            </div>
            <div class="owl-carousel owl-theme">
                @foreach ($pcVideos as $itemPc)
                    <div class="item d-flex flex-column text-white">
                        <div class="position-relative">
                            <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                                style="background-color: #353839;">
                                <small>{{ $itemPc->duration }}</small>
                            </div>
                            <img src="{{ asset('storage/' . $itemPc->thumbnail) }}" alt="Thumbnail" class="rounded"
                                style="width: 100%; height: 10rem; object-fit: cover;">
                        </div>
                        <a href="{{ route('video.show', $itemPc->url) }}" class="nav-link">
                            <h5 class="fw-bold mt-2">{{ ucfirst($itemPc->title) }}</h5>
                        </a>
                        <div class="d-flex align-items-center gap-2">
                            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                                style="width: 25px;" alt="Avatar" />
                            <h6 class="m-0 fw-semibold">{{ $itemPc->channel_name }}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- End PC Games Videos --}}


        {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
    </div>
@endsection

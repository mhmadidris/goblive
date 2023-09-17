@extends('layouts.app')

@section('content')
    <style>
        .bg-img {
            position: relative;
            min-height: 50vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 15px;
            /* padding-bottom: 25px; */
        }

        .bg-img::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-image: url('{{ asset('images/h1.jpg') }}');
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0.4;
        }

        .bg-img .text {
            position: relative;
            z-index: 1;
            color: white;
            text-align: center;
        }

        .clamp-two-lines {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>

    <div class="bg-img">
        <div class="text">
            <h1 class="fw-bold word-spacing text-uppercase m-0" style="font-family: Black Ops One; font-size: 3rem;">
                Welcome to GOBLIVE
            </h1>
            <h5 class="m-0 fw-bold">Join our community and share your passion with the world</h5>
        </div>
    </div>

    <div class="container d-flex flex-column gap-5 mt-4">
        {{-- Start Popular Streamers --}}
        <div class="d-flex flex-column">
            <div class="d-flex flex-row justify-content-center align-content-center align-items-center text-white mb-3">
                <h2 class="fw-bold">Popular Livestream</h2>
            </div>
            <div class="owl-carousel owl-theme">
                @foreach ($livestreams as $itemLive)
                    <div class="item d-flex flex-column text-white h-100">
                        <a href="{{ route('livestream.show', ['id' => $itemLive->id->videoId]) }}" class="nav-link">
                            <div class="position-relative">
                                <div class="px-2 py-1 position-absolute top-0 end-0 m-2 text-white rounded fw-bold"
                                    style="background-color: red;">
                                    <small>Live</small>
                                </div>
                                <img src="{{ $itemLive->snippet->thumbnails->high->getUrl() }}" class="rounded"
                                    style="width: 100%; height: 10rem; object-fit: cover;" alt="Thumbnail">
                            </div>
                            <h5 class="fw-bold mt-2 clamp-two-lines" title="{{ ucfirst($itemLive->snippet->title) }}">
                                {{ ucfirst($itemLive->snippet->title) }}</h5>
                        </a>
                        <div class="d-flex align-items-center gap-2">
                            <img src="{{ $channelAvatars[$itemLive->snippet->channelId] }}" class="rounded-circle"
                                style="width: 35px; height: 35px;" alt="Avatar" />
                            <div class="d-flex flex-column">
                                <h6 class="m-0 fw-semibold">{{ $itemLive->snippet->channelTitle }}</h6>
                                <small
                                    class="m-0 fw-medium">{{ number_format($subscribersCount[$itemLive->snippet->channelId]) }}
                                    subscribers</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        {{-- End Popular Streamers --}}

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
                        <a href="{{ route('video.show', $itemLatest->url) }}" class="nav-link">
                            <div class="position-relative">
                                <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                                    style="background-color: #353839;">
                                    <small>{{ $itemLatest->duration }}</small>
                                </div>
                                <img src="{{ asset('storage/' . $itemLatest->thumbnail) }}" alt="Thumbnail" class="rounded"
                                    style="width: 100%; height: 10rem; object-fit: cover;">
                            </div>
                            <h5 class="fw-bold mt-2">{{ ucfirst($itemLatest->title) }}</h5>
                        </a>
                        <div class="d-flex align-items-center gap-2">
                            <img src="{{ asset('storage/' . \App\Models\Channel::where('user_id', $itemLatest->user_id)->value('avatar')) }}"
                                class="rounded-circle" style="width: 35px; height: 35px;" alt="Avatar" />
                            <div class="d-flex flex-column">
                                <h6 class="m-0 fw-semibold">{{ ucfirst($itemLatest->channel_name) }}</h6>
                                <small class="m-0 fw-medium">{{ number_format($itemLatest->views) }} views</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- End Latest Videos --}}

        {{-- Start Mobile Games Videos --}}
        @if (count($mobileVideos) > 0)
            <div class="d-flex flex-column">
                <div
                    class="d-flex flex-row justify-content-between align-content-center align-items-center text-white mb-3">
                    <h4 class="fw-bold">Mobile Games</h4>
                    <a href="{{ route('video.index', ['category' => 'Mobile']) }}"
                        class="btn btn-sm rounded-pill px-4 fw-semibold text-white" style="background-color: #353839;">
                        See all
                    </a>
                </div>
                <div class="owl-carousel owl-theme">
                    @foreach ($mobileVideos as $itemMobile)
                        <div class="item d-flex flex-column text-white">
                            <a href="{{ route('video.show', $itemMobile->url) }}" class="nav-link">
                                <div class="position-relative">
                                    <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                                        style="background-color: #353839;">
                                        <small>{{ $itemMobile->duration }}</small>
                                    </div>
                                    <img src="{{ asset('storage/' . $itemMobile->thumbnail) }}" alt="Thumbnail"
                                        class="rounded" style="width: 100%; height: 10rem; object-fit: cover;">
                                </div>
                                <h5 class="fw-bold mt-2">{{ ucfirst($itemMobile->title) }}</h5>
                            </a>
                            <div class="d-flex align-items-center gap-2">
                                <img src="{{ asset('storage/' . \App\Models\Channel::where('user_id', $itemMobile->user_id)->value('avatar')) }}"
                                    class="rounded-circle" style="width: 35px; height: 35px;" alt="Avatar" />
                                <div class="d-flex flex-column">
                                    <h6 class="m-0 fw-semibold">{{ ucfirst($itemMobile->channel_name) }}</h6>
                                    <small class="m-0 fw-medium">{{ number_format($itemMobile->views) }} views</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        {{-- End Mobile Games Videos --}}

        {{-- Start Console Games Videos --}}
        @if (count($consoleVideos) > 0)
            <div class="d-flex flex-column">
                <div
                    class="d-flex flex-row justify-content-between align-content-center align-items-center text-white mb-3">
                    <h4 class="fw-bold">Console Games</h4>
                    <a href="{{ route('video.index', ['category' => 'Console']) }}"
                        class="btn btn-sm rounded-pill px-4 fw-semibold text-white" style="background-color: #353839;">
                        See all
                    </a>
                </div>
                <div class="owl-carousel owl-theme">
                    @foreach ($consoleVideos as $itemConsole)
                        <div class="item d-flex flex-column text-white">
                            <a href="{{ route('video.show', $itemConsole->url) }}" class="nav-link">
                                <div class="position-relative">
                                    <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                                        style="background-color: #353839;">
                                        <small>{{ $itemConsole->duration }}</small>
                                    </div>
                                    <img src="{{ asset('storage/' . $itemConsole->thumbnail) }}" alt="Thumbnail"
                                        class="rounded" style="width: 100%; height: 10rem; object-fit: cover;">
                                </div>
                                <h5 class="fw-bold mt-2">{{ ucfirst($itemConsole->title) }}</h5>
                            </a>
                            <div class="d-flex align-items-center gap-2">
                                <img src="{{ asset('storage/' . \App\Models\Channel::where('user_id', $itemConsole->user_id)->value('avatar')) }}"
                                    class="rounded-circle" style="width: 35px; height: 35px;" alt="Avatar" />
                                <div class="d-flex flex-column">
                                    <h6 class="m-0 fw-semibold">{{ ucfirst($itemConsole->channel_name) }}</h6>
                                    <small class="m-0 fw-medium">{{ number_format($itemConsole->views) }} views</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        {{-- End Console Games Videos --}}

        {{-- Start PC Games Videos --}}
        @if (count($pcVideos) > 0)
            <div class="d-flex flex-column">
                <div
                    class="d-flex flex-row justify-content-between align-content-center align-items-center text-white mb-3">
                    <h4 class="fw-bold">PC Games</h4>
                    <a href="{{ route('video.index', ['category' => 'PC']) }}"
                        class="btn btn-sm rounded-pill px-4 fw-semibold text-white" style="background-color: #353839;">
                        See all
                    </a>
                </div>
                <div class="owl-carousel owl-theme">
                    @foreach ($pcVideos as $itemPc)
                        <div class="item d-flex flex-column text-white">
                            <a href="{{ route('video.show', $itemPc->url) }}" class="nav-link">
                                <div class="position-relative">
                                    <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                                        style="background-color: #353839;">
                                        <small>{{ $itemPc->duration }}</small>
                                    </div>
                                    <img src="{{ asset('storage/' . $itemPc->thumbnail) }}" alt="Thumbnail"
                                        class="rounded" style="width: 100%; height: 10rem; object-fit: cover;">
                                </div>
                                <h5 class="fw-bold mt-2">{{ ucfirst($itemPc->title) }}</h5>
                            </a>
                            <div class="d-flex align-items-center gap-2">
                                <img src="{{ asset('storage/' . \App\Models\Channel::where('user_id', $itemPc->user_id)->value('avatar')) }}"
                                    class="rounded-circle" style="width: 35px; height: 35px;" alt="Avatar" />
                                <div class="d-flex flex-column">
                                    <h6 class="m-0 fw-semibold">{{ ucfirst($itemPc->channel_name) }}</h6>
                                    <small class="m-0 fw-medium">{{ number_format($itemPc->views) }} views</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
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

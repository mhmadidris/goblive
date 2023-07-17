@extends('layouts.app')

@section('content')
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

        .bg-btn-color {
            background-color: #353839;
            color: white;
        }

        .bg-btn-color:hover {
            background-color: white;
            color: black;
        }

        /* .bg-modal {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            background: linear-gradient(60deg, #29323c 0%, #485563 100%);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        } */

        .nav-channel-active {
            padding-bottom: 5px;
            text-decoration: none;
            font-weight: bold;
            border-bottom: 5px solid white;
        }
    </style>

    @include('pages.front.channel.information-channel')

    <div style="height: 150vh;">
        {{-- Start Latest Videos --}}
        <div class="container-md container-fluid d-flex flex-column mt-4">
            <div class="d-flex flex-row justify-content-between align-content-center align-items-center text-white mb-3">
                <h4 class="fw-bold">Latest Upload</h4>
                {{-- <a href="{{ route('video.index') }}" class="btn btn-sm rounded-pill px-4 fw-semibold text-white"
            style="background-color: #353839;">
            See all
        </a> --}}
            </div>
            <div class="owl-carousel owl-theme">
                @foreach ($latestUpload as $itemLatest)
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
                            <img src="{{ asset('storage/' . \App\Models\Channel::where('user_id', $itemLatest->user_id)->value('avatar')) }}"
                                class="rounded-circle" style="width: 25px;" alt="Avatar" />
                            <h6 class="m-0 fw-semibold">{{ $itemLatest->channel_name }}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- End Latest Videos --}}

        {{-- Start Popular Videos --}}
        <div class="container d-flex flex-column mt-4">
            <div class="d-flex flex-row justify-content-between align-content-center align-items-center text-white mb-3">
                <h4 class="fw-bold">Popular Videos</h4>
                {{-- <a href="{{ route('video.index') }}" class="btn btn-sm rounded-pill px-4 fw-semibold text-white"
            style="background-color: #353839;">
            See all
        </a> --}}
            </div>
            <div class="owl-carousel owl-theme">
                @foreach ($popularVideos as $itemLatest)
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
                            <img src="{{ asset('storage/' . \App\Models\Channel::where('user_id', $itemLatest->user_id)->value('avatar')) }}"
                                class="rounded-circle" style="width: 25px;" alt="Avatar" />
                            <h6 class="m-0 fw-semibold">{{ $itemLatest->channel_name }}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- End Popular Videos --}}
    </div>
@endsection

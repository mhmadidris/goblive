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
    </style>

    <header>
        @if (\App\Models\Channel::where('user_id', $channel->id)->value('header') == null)
            <img class="img-fluid w-100" src="{{ asset('images/header-bg.jpg') }}" alt="Thumbnail"
                style="height: 35vh; object-fit: cover;">
        @else
            <img class="img-fluid w-100"
                src="{{ asset('storage/' . \App\Models\Channel::where('user_id', $channel->id)->value('header')) }}"
                alt="Thumbnail" style="height: 35vh; object-fit: cover;">
        @endif
        <div class="container d-flex flex-row justify-content-between align-items-center my-4">
            <div class="d-flex flex-row align-items-center gap-4">
                <img class="rounded-circle shadow"
                    src="{{ asset('storage/' . \App\Models\Channel::where('user_id', $channel->id)->value('avatar')) }}"
                    alt="avatar" style="width: 100px; height: 100px; object-fit: cover; border: 2px solid white">
                <div class="d-flex flex-column">
                    <h2 class="fw-bold m-0">{{ $channel->name }}</h2>
                    <h6 class="text-gray-300">{{ '@' . $channel->username }}</h6>
                    {{-- <h6 class="fw-semibold m-0">{{ number_format($videos->sum('views'), 0, '.', ',') }} views</h6> --}}
                    @if ($channel->bio != null)
                        <p class="m-0">{{ $channel->bio }}</p>
                    @else
                        <p class="m-0">-</p>
                    @endif
                </div>
            </div>
        </div>
        <hr class="hr" />
        <div class="container" style="height: 150vh;">
            <livewire:channel-video :channel="$channel" />
        </div>
    </header>
@endsection

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

    <div class="container d-flex flex-column-reverse flex-md-row justify-content-md-arround justify-content-end mt-4"
        style="height: 150vh;">
        <div class="col-12 col-md-8">
            <h5 class="fw-bold">Description</h5>
            @if ($channel->bio != null)
                <p class="text-justify">{{ $channel->bio }}</p>
            @else
                <p class="text-center">No description info</p>
            @endif
        </div>
        <div class="col-12 col-md-4 d-flex flex-column">
            <div class="d-flex align-items-center gap-2">
                <i class="fas fa-map-marker-alt"></i>
                @if ($channel->lokasi != null)
                    <span class="fw-semibold">{{ $channel->lokasi }}</span>
                @else
                    <span class="fw-semibold">-</span>
                @endif
            </div>
            <hr class="hr">
            <div class="d-flex align-items-center gap-2">
                <i class="fas fa-eye"></i>
                <span class="fw-semibold">{{ number_format($viewCount) }} views</span>
            </div>
            <hr class="hr">
        </div>
    </div>
@endsection

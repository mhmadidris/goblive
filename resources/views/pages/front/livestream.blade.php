@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column gap-4">
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
            <div class="d-flex flex-column justify-content-center align-content-center align-items-center">
                <h2 style="font-family: Black Ops One; font-size: 2.5rem;">GOBLIVE</h2>
                <p>Get ready to explore, compete, and redefine what it means to be a hero. Step into the extraordinary, and
                    let
                    the
                    games begin.</p>
            </div>
        </div>

        <div class="row">
            @foreach ($livestreams as $livestream)
                <div class="col-md-3 mb-3">
                    <div class="d-flex flex-column text-white">
                        <div class="position-relative">
                            <div class="px-2 py-1 position-absolute top-0 end-0 m-2 text-white rounded fw-bold"
                                style="background-color: red;">
                                <small>Live</small>
                            </div>
                            <img src="{{ $livestream->snippet->thumbnails->high->getUrl() }}" class="rounded"
                                style="width: 100%; height: 10rem; object-fit: cover;" alt="Thumbnail">
                        </div>
                        <a href="{{ route('livestream.show', ['id' => $livestream->id->videoId]) }}" class="nav-link">
                            <h5 class="fw-bold mt-2">{{ $livestream->snippet->title }}</h5>
                        </a>

                        <div class="d-flex align-items-center gap-2">
                            <img src="{{ $channelAvatars[$livestream->snippet->channelId] }}" class="rounded-circle"
                                style="width: 25px;" alt="Avatar" />
                            <h6 class="m-0 fw-semibold">{{ $livestream->snippet->channelTitle }}</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

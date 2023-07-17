@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-column gap-2">
        <div class="row flex-column-reverse flex-lg-row-reverse justify-content-center align-items-center p-4 gap-2"
            style="min-height: 50vh;">
            <div class="col-lg-5 col-10 d-flex flex-column justify-content-center align-items-center align-items-lg-start">
                <h2 class="fw-bold text-center text-lg-start" style="font-size: 2.5rem;">Game Content Creators</h2>
                <p class="fw-medium text-lg-start text-center" style="font-size: 1.15rem;">
                    Connect with a vibrant community of game content creators. Share your gaming experiences, strategies,
                    and
                    tips. Collaborate with fellow creators and grow your audience.
                </p>
            </div>
            <div class="col-lg-5 col-10 d-flex flex-column justify-content-center align-items-lg-end align-items-center">
                <img src="{{ asset('images/bg-about-1.png') }}" class="img-fluid" alt="Image">
            </div>
        </div>

        <div class="row flex-lg-row-reverse justify-content-center align-items-center p-4 gap-2" style="min-height: 50vh;">
            <div class="col-lg-5 col-10 d-flex flex-column justify-content-center align-items-lg-end align-items-center">
                <img src="{{ asset('images/bg-about-2.png') }}" class="img-fluid" alt="Image">
            </div>
            <div class="col-lg-5 col-10 d-flex flex-column justify-content-center align-items-center align-items-lg-end">
                <h2 class="fw-bold text-center text-lg-end" style="font-size: 2.5rem;">Videos and Streamers</h2>
                <p class="fw-medium text-lg-end text-center" style="font-size: 1.15rem;">
                    Explore an exciting collection of videos and streams from talented creators. Enjoy live gaming sessions,
                    engaging commentary, and entertaining content. Find your favorite streamers and discover new gaming
                    experiences.
                </p>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column gap-4">
        <div class="d-flex flex-column-reverse flex-lg-row justify-content-lg-between justify-content-center align-content-center align-items-center p-4"
            style="min-height: 50vh;">
            <div class="col-lg-5 col-10 d-flex flex-column justify-content-center align-items-center align-items-lg-start">
                <h2 class="fw-bold text-center text-lg-start" style="font-size: 2.5rem;">About Us</h2>
                <p class="fw-medium text-lg-start text-center" style="font-size: 1.15rem;">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi aliquam, iure cupiditate ducimus dolore
                    enim! Non quidem et a ullam excepturi saepe necessitatibus ab deleniti repellat, provident, harum, aut
                    beatae.
                </p>
            </div>
            <div class="col-lg-5 col-10 d-flex flex-column justify-content-center align-items-lg-end align-items-center">
                <img src="{{ asset('images/bg-about-1.png') }}" class="img-fluid" alt="Image">
            </div>
        </div>

        <div class="d-flex flex-column-reverse flex-lg-row justify-content-lg-between justify-content-center align-content-center align-items-center p-4"
            style="min-height: 50vh;">
            <div class="col-lg-5 col-10 d-flex flex-column justify-content-center align-items-lg-end align-items-center">
                <img src="{{ asset('images/bg-about-2.png') }}" class="img-fluid" alt="Image">
            </div>
            <div class="col-lg-5 col-10 d-flex flex-column justify-content-center align-items-center align-items-lg-end">
                <h2 class="fw-bold text-center text-lg-end" style="font-size: 2.5rem;">About Us</h2>
                <p class="fw-medium text-lg-end text-center" style="font-size: 1.15rem;">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi aliquam, iure cupiditate ducimus dolore
                    enim! Non quidem et a ullam excepturi saepe necessitatibus ab deleniti repellat, provident, harum, aut
                    beatae.
                </p>
            </div>
        </div>
    </div>
@endsection

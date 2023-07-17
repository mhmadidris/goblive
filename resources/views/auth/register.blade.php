@extends('layouts.front')

@section('content')
    <style>
        .btn-color {
            border: 1.5px solid white;
            font-weight: bold;
            color: white;
        }

        .btn-color:hover {
            border: 1.5px solid transparent;
            font-weight: bold;
            background-color: white;
            color: black;
        }
    </style>

    <div class="container d-flex flex-column align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6">
            <div class="container my-2">
                <div class="text-center text-white">
                    <h2 class="fw-bold fs-4">Register as a Content Creator</h2>
                    <p class="fs-5">Create and share your gaming videos with the world!</p>
                </div>
            </div>

            <div class="container-fluid card shadow text-white" style="background: linear-gradient(#161616, #1c1c1c);">
                <div class="card-body d-flex flex-md-row flex-column justify-content-between align-items-center gap-3">
                    <a href="{{ url('/') }}" class="nav-link d-none d-md-flex flex-row align-items-center gap-2"
                        style="font-size: 1rem;">
                        <i class="fas fa-chevron-left"></i>
                        <span class="fw-semibold">Back</span>
                    </a>
                    <a href="{{ url('/') }}" class="text-center fw-bold m-0 nav-link"
                        style="font-family: Black Ops One; font-size: 1.5rem;">{{ config('app.name') }}
                    </a>
                    <a href="{{ route('login') }}" class="btn btn-color btn-sm">Login</a>
                </div>

                <hr class="hr m-0">

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="card-body d-flex flex-column gap-2">
                        <div>
                            <label for="name" class="col-form-label fw-bold text-md-end">{{ __('Name') }}</label>

                            <div class="">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" placeholder="John Smith" required autocomplete="name"
                                    autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="email"
                                class="col-form-label text-md-end fw-bold">{{ __('Email Address') }}</label>

                            <div class="">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="john@email.com"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="password" class="col-form-label text-md-end fw-bold">{{ __('Password') }}</label>

                            <div>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password" placeholder="••••••••••">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="password-confirm"
                                class="col-form-label text-md-end fw-bold">{{ __('Confirm Password') }}</label>

                            <div>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="••••••••••">
                            </div>
                        </div>

                        <button type="submit" class="btn text-white fw-bold mt-2" style="background-color: #454545;">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>






    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

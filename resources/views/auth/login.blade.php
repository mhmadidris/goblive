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
                    <h2 class="fw-bold fs-4">Login to Your Account</h2>
                    <p class="fs-5">Join the world of gaming and videos as a content creator!</p>
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
                    <a href="{{ route('register') }}" class="btn btn-color btn-sm">Register</a>
                </div>

                <hr class="hr m-0">

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="card-body d-flex flex-column gap-2">
                        <div>
                            <label for="email"
                                class="col-form-label text-md-end fw-bold">{{ __('Email Address') }}</label>

                            <div class="">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required placeholder="john@email.com" autocomplete="email"
                                    autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="password" class="col-form-label text-md-end fw-bold">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="••••••••••" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center justify-content-between my-1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <a class="nav-link" style="text-decoration: underline;"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="btn text-white fw-bold"
                            style="background-color: #454545;">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

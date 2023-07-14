<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Owl Carousel --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @livewireStyles

    <style>
        body {
            font-family: 'Raleway';
            background: rgb(2, 0, 36);
            background: radial-gradient(circle, rgba(2, 0, 36, 1) 0%, rgba(0, 49, 52, 1) 100%);
        }

        .sticky-nav {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 100;
            transition: background-color 0.3s ease-in-out;
        }

        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }

        .btn-size {
            width: 100px;
            /* Set the desired width for the buttons */
        }

        .dropdown-toggle::after {
            display: none;
        }

        .dropdown-item:hover {
            background-color: #414a4c;
        }

        .form-control:focus {
            outline: none;
            box-shadow: none;
        }
    </style>

    <script>
        window.addEventListener('scroll', function() {
            var navbar = document.querySelector('.navbar');
            var scrolled = window.scrollY > 0;
            navbar.classList.toggle('sticky-nav', scrolled);

            if (scrolled) {
                navbar.style.boxShadow = '0 2px 4px rgba(0, 0, 0, 0.1)';
                navbar.style.transition = 'background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out';
                navbar.style.backgroundColor = '#0e1111';
            } else {
                navbar.style.boxShadow = 'none';
                navbar.style.transition = 'background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out';
                navbar.style.backgroundColor = 'transparent';
            }
        });
    </script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand text-white fw-bold" href="{{ url('/') }}"
                    style="font-family: Black Ops One; font-size: 1.5rem;">
                    {{ config('app.name') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Center of Navbar -->
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item {{ Request::is('/') ? 'fw-bolder' : '' }} h5 mx-1">
                            <a class="nav-link text-white" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item {{ Request::is('video') ? 'fw-bolder' : '' }} h5 mx-1">
                            <a class="nav-link text-white" href="{{ route('video.index') }}">Video</a>
                        </li>
                        <li class="nav-item {{ Request::is('livestream') ? 'fw-bolder' : '' }} h5 mx-1">
                            <a class="nav-link text-white" href="{{ url('livestream') }}">Livestream</a>
                        </li>
                        <li class="nav-item h5 mx-1 {{ Request::is('about') ? 'fw-bolder' : '' }}">
                            <a class="nav-link text-white" href="{{ url('/about') }}">About</a>
                        </li>
                        <!-- Add more menu items here as needed -->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            <div class="d-flex flex-row gap-3">
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link text-black btn btn-size fw-bold" href="{{ route('login') }}"
                                            style="background-color: white; font-size: 0.85rem; border: 2px solid transparent;">{{ __('LOGIN') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link text-white btn btn-size fw-bold" href="{{ route('register') }}"
                                            style="border: 2px solid white; font-size: 0.85rem;">{{ __('REGISTER') }}</a>
                                    </li>
                                @endif
                            </div>
                        @else
                            {{-- <li class="nav-item dropdown d-flex align-items-center justify-content-center mx-2">
                                <a href="" class="nav-link text-white">
                                    <i class="fas fa-bell fa-lg"></i>
                                </a>
                            </li> --}}

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white d-flex" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="fw-bold">{{ Auth::user()->name }}</span>
                                        <small class="fw-medium">{{ Auth::user()->email }}</small>
                                    </div>
                                    <img src="{{ asset('storage/' . \App\Models\Channel::where('user_id', Auth::user()->id)->value('avatar')) }}"
                                        alt="Avatar" class="rounded-circle mx-2"
                                        style="width: 40px; height: 40px; border: 2px solid white;">
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" style="background-color: #353839;"
                                    aria-labelledby="navbarDropdown">
                                    {{-- <div
                                        class="dropdown-item-text text-white d-flex flex-row justify-content-center align-items-center">
                                        <img src="{{ asset('storage/' . \App\Models\Channel::where('user_id', Auth::user()->id)->value('avatar')) }}"
                                            alt="Avatar" class="rounded-circle mx-2" style="width: 30px; height: 30px;">
                                        <div class="d-flex flex-column">
                                            <small class="fw-bold">{{ $channel->name }}</small>
                                            <small>{{ $channel->email }}</small>
                                        </div>
                                    </div> --}}

                                    @php
                                        $myChannel = App\Models\Channel::find(Auth::user()->id);
                                    @endphp
                                    <div class="dropdown-item-text d-flex flex-row justify-content-center align-items-center align-content-center gap-2"
                                        style="color: #f3c70d;">
                                        <i class="fas fa-coins"></i>
                                        <span class="fw-bold">{{ number_format($myChannel->coin) }}</span>
                                    </div>

                                    <hr class="hr text-white" />

                                    <a class="dropdown-item text-white" href="{{ route('mychannel.index') }}">
                                        {{ __('My Channel') }}
                                    </a>

                                    <a class="dropdown-item text-white" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="text-white">
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>


    <script>
        $('.owl-carousel').owlCarousel({
            loop: false,
            margin: 15,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });
    </script>

    @if (session()->has('toast'))
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true">
            <div class="toast-header">
                <strong class="me-auto">{{ session('toast')['type'] }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('toast')['message'] }}
            </div>
        </div>
    @endif


    @livewireScripts

    <x-notify::notify />
    @notifyJs
</body>

</html>

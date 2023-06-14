@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column gap-4">
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-column w-50 text-white">
                <h1 class="fw-bold" style="font-size: 4rem;">Play, Compete, Follow Popular Streamers</h1>
                <p class="fw-bold" style="font-size: 1rem;">The best streamers gather to have a good time, be among us,
                    join
                    us!</p>
            </div>
            <div class="d-flex flex-column w-50 text-white">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/sUKwTVAc0Vo?autoplay=1&mute=1"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen class="rounded"></iframe>
                <p class="fw-bold mt-2" style="font-size: 1rem;">The best streamers gather to have a good time, be among us,
                    join
                    us!</p>
            </div>
        </div>

        {{-- Start Latest Videos --}}
        <div class="d-flex flex-column">
            <div class="d-flex flex-row justify-content-between align-content-center align-items-center text-white mb-3">
                <h4 class="fw-bold">Latest Videos</h4>
                <a href="" class="btn btn-sm rounded-pill px-4 fw-semibold text-white"
                    style="background-color: #353839;">
                    See all
                </a>
            </div>
            <div class="owl-carousel owl-theme">
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Latest Videos --}}

        {{-- Start Mobile Games Videos --}}
        <div class="d-flex flex-column">
            <div class="d-flex flex-row justify-content-between align-content-center align-items-center text-white mb-3">
                <h4 class="fw-bold">Mobile Games</h4>
                <a href="" class="btn btn-sm rounded-pill px-4 fw-semibold text-white"
                    style="background-color: #353839;">
                    See all
                </a>
            </div>
            <div class="owl-carousel owl-theme">
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Mobile Games Videos --}}

        {{-- Start Console Games Videos --}}
        <div class="d-flex flex-column">
            <div class="d-flex flex-row justify-content-between align-content-center align-items-center text-white mb-3">
                <h4 class="fw-bold">Console Games</h4>
                <a href="" class="btn btn-sm rounded-pill px-4 fw-semibold text-white"
                    style="background-color: #353839;">
                    See all
                </a>
            </div>
            <div class="owl-carousel owl-theme">
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Console Games Videos --}}

        {{-- Start PC Games Videos --}}
        <div class="d-flex flex-column">
            <div class="d-flex flex-row justify-content-between align-content-center align-items-center text-white mb-3">
                <h4 class="fw-bold">PC Games</h4>
                <a href="" class="btn btn-sm rounded-pill px-4 fw-semibold text-white"
                    style="background-color: #353839;">
                    See all
                </a>
            </div>
            <div class="owl-carousel owl-theme">
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
                <div class="item d-flex flex-column text-white">
                    <div class="position-relative">
                        <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                            style="background-color: #353839;">
                            <small>12:48</small>
                        </div>
                        <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                            alt="Thumbnail" class="rounded">
                    </div>
                    <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 25px;" alt="Avatar" />
                        <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                    </div>
                </div>
            </div>
        </div>
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

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
    </style>

    <header>
        <img class="img-fluid w-100" src="{{ asset('images/header-bg.jpg') }}" alt="Thumbnail"
            style="height: 35vh; object-fit: cover;">
        <div class="container d-flex flex-row justify-content-between align-items-center my-4">
            <div class="d-flex flex-row align-items-center gap-4">
                <img class="rounded-circle shadow"
                    src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=580&q=80"
                    alt="avatar" style="width: 100px; height: 100px; object-fit: cover;">
                <div class="d-flex flex-column">
                    <h2 class="fw-bold">Aulia Rahmat</h3>
                        <h6 class="fw-semibold m-0">123,456 views</h6>
                        <p class="m-0">I'm game streamer hobby</p>
                </div>
            </div>
            <div class="d-flex flex-row gap-2">
                <a href="{{ route('mychannel.video.create') }}"
                    class="btn d-flex flex-row align-items-center gap-2 text-white" style="background-color: #353839;">
                    <i class="fas fa-plus"></i>
                    <span>Upload new video</span>
                </a>
                <a href="#" class="btn text-white" style="background-color: #353839;">
                    <i class="fas fa-edit"></i>
                </a>
            </div>
        </div>
        <hr class="hr" />
        <div class="container">
            <div class="p-0 input-group rounded-pill shadow-sm my-3">
                <input class="form-control border-0 shadow-none rounded-start-pill custom-input-bg text-white px-3"
                    type="text" wire:model="search" placeholder="Search video" id="example-search-input">
                <span class="input-group-append border-0">
                    <div class="btn text-white rounded-end-pill ms-n5 custom-button-bg">
                        <i class="fas fa-search"></i>
                    </div>
                </span>
            </div>

            <h5 class="text-white my-3">Result of <strong>"{{ 'Mobile Legends' }}"</strong></h5>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="d-flex flex-column text-white">
                        <div class="position-relative">
                            <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                                style="background-color: #353839;">
                                <small>12:48</small>
                            </div>
                            <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                                alt="Thumbnail" class="rounded" style="width: 100%;">
                        </div>
                        <a href="/dashboard/detail" class="nav-link">
                            <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                        </a>
                        <div class="d-flex align-items-center gap-2">
                            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                                style="width: 25px;" alt="Avatar" />
                            <a href="" class="nav-link">
                                <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="d-flex flex-column text-white">
                        <div class="position-relative">
                            <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                                style="background-color: #353839;">
                                <small>12:48</small>
                            </div>
                            <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                                alt="Thumbnail" class="rounded" style="width: 100%;">
                        </div>
                        <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                        <div class="d-flex align-items-center gap-2">
                            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                                style="width: 25px;" alt="Avatar" />
                            <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="d-flex flex-column text-white">
                        <div class="position-relative">
                            <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                                style="background-color: #353839;">
                                <small>12:48</small>
                            </div>
                            <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                                alt="Thumbnail" class="rounded" style="width: 100%;">
                        </div>
                        <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                        <div class="d-flex align-items-center gap-2">
                            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                                style="width: 25px;" alt="Avatar" />
                            <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="d-flex flex-column text-white">
                        <div class="position-relative">
                            <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                                style="background-color: #353839;">
                                <small>12:48</small>
                            </div>
                            <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                                alt="Thumbnail" class="rounded" style="width: 100%;">
                        </div>
                        <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                        <div class="d-flex align-items-center gap-2">
                            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                                style="width: 25px;" alt="Avatar" />
                            <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="d-flex flex-column text-white">
                        <div class="position-relative">
                            <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                                style="background-color: #353839;">
                                <small>12:48</small>
                            </div>
                            <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                                alt="Thumbnail" class="rounded" style="width: 100%;">
                        </div>
                        <h5 class="fw-bold mt-2">Serious fight dogs and cats</h5>
                        <div class="d-flex align-items-center gap-2">
                            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                                style="width: 25px;" alt="Avatar" />
                            <h6 class="m-0 fw-semibold">Pewdiepie</h6>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="d-flex flex-column text-white">
                        <div class="position-relative">
                            <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                                style="background-color: #353839;">
                                <small>12:48</small>
                            </div>
                            <img src="https://images.unsplash.com/photo-1634984884181-f8a6b98decdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80"
                                alt="Thumbnail" class="rounded" style="width: 100%;">
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
        </div>
    </header>
    <div class="container d-flex flex-column gap-4">
    </div>
@endsection

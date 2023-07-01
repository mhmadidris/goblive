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

        /* .bg-modal {
                                                                                                                                                                                                                                                        background: linear-gradient(60deg, #29323c 0%, #485563 100%);
                                                                                                                                                                                                                                                    } */
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
                        <div class="d-flex flex-row align-items-center gap-2">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Indonesia</span>
                        </div>
                </div>
            </div>
            <div class="d-flex flex-row gap-2">
                <a href="{{ route('mychannel.video.create') }}"
                    class="btn d-flex flex-row align-items-center gap-2 text-white" style="background-color: #353839;">
                    <i class="fas fa-plus"></i>
                    <span>Upload new video</span>
                </a>
                <button type="button" data-bs-toggle="modal" data-bs-target="#editProfile" class="btn text-white"
                    style="background-color: #353839;">
                    <i class="fas fa-edit"></i>
                </button>
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

            @foreach ($videos as $item)
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="d-flex flex-column text-white">
                            <div class="position-relative">
                                <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                                    style="background-color: #353839;">
                                    <small>{{ $item->duration }}</small>
                                </div>
                                <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="Thumbnail" class="rounded"
                                    style="width: 100%; height: 10rem; object-fit: cover;">
                            </div>
                            <a href="{{ route('mychannel.video.show', $item->url) }}" class="nav-link">
                                <h5 class="fw-bold mt-2">{{ $item->title }}</h5>
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
            @endforeach
        </div>
        </div>
    </header>

    <!-- Modal Edir Profile -->
    <div class="modal fade" id="editProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editProfileLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content bg-modal text-black">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div id="headerPreview">
                            <img class="rounded w-100"
                                src="https://images.unsplash.com/photo-1495277493816-4c359911b7f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=865&q=80"
                                style="height: 10rem; object-fit: cover;">
                        </div>
                        <label for="header" class="form-label">Header</label>
                        <input type="file" class="form-control" id="header" name="header" accept="image/*"
                            onchange="previewHeader(event)">
                    </div>

                    <div class="mb-3">
                        <div class="text-center" id="avatarPreview">
                            <img class="rounded-circle"
                                src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80"
                                style="width: 10rem; height: 10rem; object-fit: cover;">
                        </div>
                        <label for="avatar" class="form-label">Avatar</label>
                        <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*"
                            onchange="previewAvatar(event)">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="email" class="form-control" id="name" name="name"
                            placeholder="cth: John Smith">
                    </div>

                    <div class="mb-3">
                        <label for="bioForm" class="form-label">Bio</label>
                        <textarea class="form-control" id="bioForm" rows="4" style="resize: none;"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewAvatar(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('avatarPreview');
                output.innerHTML = '<img class="rounded-circle" src="' + reader.result +
                    '" style="width: 10rem; height: 10rem; object-fit: cover;">';
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        function previewHeader(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('headerPreview');
                output.innerHTML = '<img class="rounded-circle" src="' + reader.result +
                    '" style="width: 10rem; height: 10rem; object-fit: cover;">';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection

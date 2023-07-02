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
                    <h2 class="fw-bold m-0">{{ Auth::user()->name }}</h2>
                    <h6 class="text-gray-300">{{ '@' . $myChannel->username }}</h6>
                    {{-- <h6 class="fw-semibold m-0">{{ number_format($videos->sum('views'), 0, '.', ',') }} views</h6> --}}
                    <p class="m-0">I'm game streamer hobby</p>
                </div>
            </div>
            <div class="d-flex flex-row gap-2">
                <a href="{{ route('mychannel.video.create') }}"
                    class="btn d-flex flex-row align-items-center gap-2 bg-btn-color">
                    <i class="fas fa-plus"></i>
                    <span>Upload new video</span>
                </a>
                <button type="button" data-bs-toggle="modal" data-bs-target="#editProfile" class="btn bg-btn-color">
                    <i class="fas fa-edit"></i>
                </button>
            </div>
        </div>
        <hr class="hr" />
        <div class="container" style="height: 150vh;">
            <livewire:my-video :myChannel="$myChannel" />
        </div>
    </header>

    <!-- Modal Edit Profile -->
    <div class="modal fade" id="editProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editProfileLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content bg-modal text-black">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileLabel">Edit Channel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="header" class="form-label fw-semibold m-0">Header</label>
                        <div id="headerPreview">
                            <img class="rounded w-100 my-2 shadow-sm"
                                src="https://images.unsplash.com/photo-1495277493816-4c359911b7f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=865&q=80"
                                style="height: 10rem; object-fit: cover;">
                        </div>
                        <input type="file" class="form-control" id="header" name="header" accept="image/*"
                            onchange="previewHeader(event)">
                    </div>

                    <div class="mb-3">
                        <div class="d-flex flex-column" id="avatarPreview">
                            <label for="avatar" class="form-label fw-semibold m-0">Avatar</label>
                            <div class="text-center">
                                <img class="rounded-circle my-2 shadow-sm"
                                    src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80"
                                    style="width: 10rem; height: 10rem; object-fit: cover;">
                            </div>
                        </div>
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
                        <textarea class="form-control" id="bioForm" rows="4" style="resize: none;"
                            placeholder="cth: Professional games streamer..."></textarea>
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
        function confirmDelete(event) {
            event.preventDefault();

            if (confirm('Are you sure you want to delete this video?')) {
                document.getElementById('delete-form').submit();
            }
        }
    </script>

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
                output.innerHTML = '<img class="rounded w-100 my-2 shadow-sm" src="' + reader.result +
                    '" style="height: 10rem; object-fit: cover;">';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection

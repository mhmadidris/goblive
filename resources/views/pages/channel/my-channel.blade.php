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
        @if (\App\Models\Channel::where('user_id', Auth::user()->id)->value('header') == null)
            <img class="img-fluid w-100" src="{{ asset('images/header-bg.jpg') }}" alt="Thumbnail"
                style="height: 35vh; object-fit: cover;">
        @else
            <img class="img-fluid w-100"
                src="{{ asset('storage/' . \App\Models\Channel::where('user_id', Auth::user()->id)->value('header')) }}"
                alt="Thumbnail" style="height: 35vh; object-fit: cover;">
        @endif
        <div class="container d-flex flex-row justify-content-between align-items-center my-4">
            <div class="d-flex flex-row align-items-center gap-4">
                <img class="rounded-circle shadow"
                    src="{{ asset('storage/' . \App\Models\Channel::where('user_id', Auth::user()->id)->value('avatar')) }}"
                    alt="avatar" style="width: 100px; height: 100px; object-fit: cover; border: 2px solid white">
                <div class="d-flex flex-column">
                    <h2 class="fw-bold m-0">{{ Auth::user()->name }}</h2>
                    <h6 class="text-gray-300">{{ '@' . $myChannel->username }}</h6>
                    {{-- <h6 class="fw-semibold m-0">{{ number_format($videos->sum('views'), 0, '.', ',') }} views</h6> --}}
                    @if ($myChannel->bio != null)
                        <p class="m-0">{{ $myChannel->bio }}</p>
                    @else
                        <p class="m-0">-</p>
                    @endif
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
    <div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-modal text-black">
                <form action="{{ route('mychannel.update', $myChannel->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProfileLabel">Edit Channel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="header" class="form-label fw-semibold m-0">Header</label>
                            <div id="headerPreview">
                                @if (\App\Models\Channel::where('user_id', Auth::user()->id)->value('header') == null)
                                    <img class="rounded w-100 my-2 shadow-sm" src="{{ asset('images/header-bg.jpg') }}"
                                        style="height: 10rem; object-fit: cover;">
                                @else
                                    <img class="rounded w-100 my-2 shadow-sm"
                                        src="{{ asset('storage/' . \App\Models\Channel::where('user_id', Auth::user()->id)->value('header')) }}"
                                        style="height: 10rem; object-fit: cover;">
                                @endif
                            </div>
                            <input type="file" class="form-control" id="header" name="header" accept="image/*"
                                onchange="previewHeader(event)">
                        </div>

                        <div class="mb-3">
                            <div class="d-flex flex-column">
                                <label for="avatar" class="form-label fw-semibold m-0">Avatar</label>
                                <div class="text-center" id="avatarPreview">
                                    <img class="rounded-circle my-2 shadow-sm"
                                        src="{{ asset('storage/' . \App\Models\Channel::where('user_id', Auth::user()->id)->value('avatar')) }}"
                                        style="width: 10rem; height: 10rem; object-fit: cover;">
                                </div>
                            </div>
                            <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*"
                                onchange="previewAvatar(event)">
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ Auth::user()->name }}" placeholder="cth: John Smith">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="{{ Auth::user()->email }}" disabled placeholder="cth: john@email.com">
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="{{ $myChannel->username }}" placeholder="@admin">
                        </div>

                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea class="form-control" id="bioForm" rows="4" style="resize: none;" name="bio"
                                placeholder="cth: Professional games streamer...">{{ $myChannel->bio }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
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
        // Get the username input element
        var usernameInput = document.getElementById('username');

        // Add an event listener to the input element
        usernameInput.addEventListener('input', function(event) {
            var username = event.target.value;

            // Remove any spaces from the username
            var formattedUsername = username.replace(/\s/g, '');

            // Update the input value with the formatted username
            event.target.value = formattedUsername;
        });
    </script>

    <script>
        // Get the file input element
        const fileInput = document.getElementById('fileInput');

        // Add an event listener to the file input
        fileInput.addEventListener('change', function() {
            const file = fileInput.files[0];
            const img = document.getElementById('avatarImage');

            // Check if the file exists and is an image
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    img.src = e.target.result;

                    // Perform validation for dimensions and file size
                    const image = new Image();
                    image.src = e.target.result;

                    image.onload = function() {
                        const width = this.width;
                        const height = this.height;
                        const maxSize = 180; // Maximum dimensions in pixels
                        const maxSizeBytes = 2 * 1024 * 1024; // Maximum file size in bytes (2MB)

                        if (width > maxSize || height > maxSize || file.size > maxSizeBytes) {
                            // Reset the file input and display an error message
                            fileInput.value = '';
                            img.src =
                                '{{ asset('default-avatar.png') }}'; // Replace with a default avatar image or an appropriate error image
                            alert(
                                'Please choose an image with a maximum dimension of 180x180 pixels and a maximum file size of 2MB.'
                            );
                        }
                    };
                };

                reader.readAsDataURL(file);
            }
        });
    </script>

    <script>
        function previewAvatar(event) {
            var file = event.target.files[0];

            // Validate file size
            var fileSize = file.size / 1024 / 1024; // in MB
            if (fileSize > 2) {
                alert('Please choose an image file smaller than 2MB.');
                event.target.value = ''; // Clear the input value
                return;
            }

            // Create an image element to check dimensions
            var img = new Image();
            img.onload = function() {
                // Validate image dimensions
                if (this.width > 1920 || this.height > 1920) {
                    alert('Please choose an image with dimensions up to 1920x1920 pixels.');
                    event.target.value = ''; // Clear the input value
                    return;
                }

                // If validation passes, display the preview
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.getElementById('avatarPreview');
                    output.innerHTML = '<div class="text-center"><img class="rounded-circle my-2 shadow-sm" src="' +
                        reader.result +
                        '" style="width: 10rem; height: 10rem; object-fit: cover;"></div>';
                };
                reader.readAsDataURL(file);
            };
            img.src = URL.createObjectURL(file);
        };

        function previewHeader(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('headerPreview');
                output.innerHTML = '<img class="rounded w-100 my-2 shadow-sm" src="' + reader.result +
                    '" style="height: 10rem; object-fit: cover;">';
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endsection

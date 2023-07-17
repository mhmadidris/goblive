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

        .nav-channel-active {
            padding-bottom: 5px;
            text-decoration: none;
            font-weight: bold;
            border-bottom: 5px solid white;
        }
    </style>

    @include('pages.channel.information-channel')

    <div class="container d-flex flex-column-reverse flex-md-row justify-content-md-arround justify-content-end mt-4"
        style="height: 150vh;">
        <div class="col-12 col-md-8">
            <h5 class="fw-bold">Description</h5>
            @if ($myChannel->bio != null)
                <p class="text-justify">{{ $myChannel->bio }}</p>
            @else
                <p class="text-center">No description info</p>
            @endif
        </div>
        <div class="col-12 col-md-4 d-flex flex-column">
            <div class="d-flex align-items-center gap-2">
                <i class="fas fa-map-marker-alt"></i>
                @if ($myChannel->lokasi != null)
                    <span class="fw-semibold">{{ $myChannel->lokasi }}</span>
                @else
                    <span class="fw-semibold">-</span>
                @endif
            </div>
            <hr class="hr">
            <div class="d-flex align-items-center gap-2">
                <i class="fas fa-eye"></i>
                <span class="fw-semibold">{{ number_format($viewCount) }} views</span>
            </div>
            <hr class="hr">
        </div>
    </div>

    @include('pages.channel.modal-edit-channel')

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

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex gap-2 h5">
            <a href="{{ url()->previous() }}" class="nav-link">My Channel</a>
            <h5>></h5>
            <a href="{{ route('mychannel.video.create') }}" class="nav-link">Add Video</a>
        </div>

        <form action="{{ route('mychannel.video.update', $video->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="d-flex flex-column justify-content-between gap-3">
                <div class="card card-body text-black bg-card" style="background-color: #a8b8d0;">
                    <div class="d-flex flex-row justify-content-between align-content-center align-items-center mb-3">
                        <h3 class="fw-bold m-0">Upload Video</h3>
                        {{-- <div class="d-flex flex-row gap-4">
                            <div class="d-flex flex-row align-items-center gap-2">
                                <i class="fas fa-eye"></i>
                                <span class="fw-semibold">123,456 views</span>
                            </div>

                            <div class="d-flex flex-row align-items-center gap-2">
                                <i class="fas fa-clock"></i>
                                <span class="fw-semibold" title="12 January 2023">3 days ago</span>
                            </div>
                        </div> --}}
                    </div>
                    <div class="mb-3 d-flex justify-content-between gap-3">
                        <div class="col-md-8">
                            <img id="defaultImage" class="rounded shadow-sm" src="{{ asset('images/default-video.png') }}"
                                style="width: 100%; height: 26.5rem; object-fit: cover; display: none;">
                            <video id="videoPreview" src="{{ asset('storage/' . $video->video) }}" class="rounded" controls
                                style="width: 100%; height: 26.5rem; object-fit: cover;"></video>
                        </div>
                        {{-- <input class="form-control d-md-none d-block" type="file" id="videoInput" name="video"
                            accept="video/*" required> --}}
                        <div class="card card-body col-md-4">
                            <div class="mb-3 d-flex flex-column">
                                <label for="imageInput" class="form-label fw-semibold">Select Thumbnail:</label>
                                <img class="rounded shadow-sm mb-2" id="imagePreview"
                                    src="{{ asset('storage/' . $video->thumbnail) }}" alt="Image Preview"
                                    style="width: 100%; height: 10rem; object-fit:unset;">
                                <input type="file" class="form-control" name="thumbnail" id="imageInput"
                                    accept="image/*">
                            </div>

                            <div class="form-outline mb-3">
                                <label class="form-label fw-semibold" for="visibility">Visibility</label>
                                <select class="form-select" name="visibility" id="visibility" required>
                                    <option value="" disabled selected>-- Choose Visibility --</option>
                                    <option value="Public" {{ $video->visibility === 'Public' ? 'selected' : '' }}>Public
                                    </option>
                                    <option value="Private" {{ $video->visibility === 'Private' ? 'selected' : '' }}>Private
                                    </option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <h6><strong>Duration:</strong></h6>
                                </div>
                                <div class="col">
                                    <input type="text" id="duration" name="duration" class="form-control border-0 p-0"
                                        value="{{ $video->duration }}" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <h6><strong>Format:</strong></h6>
                                </div>
                                <div class="col">
                                    <input type="text" id="format" name="format" class="form-control border-0 p-0"
                                        value="{{ $video->format }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input class="form-control" type="file" id="videoInput" name="video" accept="video/*">
                </div>

                <div class="card card-body text-black" style="background-color: #a8b8d0;">
                    <div class="form-outline mb-3">
                        <label class="form-label fw-semibold" for="titleVideo">Title</label>
                        <input type="text" id="titleVideo" name="title" class="form-control"
                            value="{{ $video->title }}" required />
                    </div>

                    <div class="form-outline mb-3">
                        <label class="form-label fw-semibold" for="listGame">Game</label>
                        <select class="form-select select2" aria-label="Default select example" id="listGame"
                            name="gameId" required>
                            <option value="" selected disabled>-- Choose Game --</option>
                            @php
                                // Sort the $jsonData array by 'title' in ascending order
                                usort($jsonData, function ($a, $b) {
                                    return strcasecmp($a['title'], $b['title']);
                                });
                            @endphp

                            @foreach ($jsonData as $game)
                                <option value="{{ $game['title'] }}">{{ $game['title'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-outline mb-3">
                        <label class="form-label fw-semibold" for="categoryVideo">Category</label>
                        <select class="form-select" aria-label="Default select example" id="categoryVideo" name="category"
                            required>
                            <option value="" disabled>-- Choose Category --</option>
                            <option value="Console" {{ $video->category === 'Console' ? 'selected' : '' }}>Console Game
                            </option>
                            <option value="PC" {{ $video->category === 'PC' ? 'selected' : '' }}>PC Game</option>
                            <option value="Mobile" {{ $video->category === 'Mobile' ? 'selected' : '' }}>Mobile Game
                            </option>
                        </select>
                    </div>

                    <div class="form-outline">
                        <label for="descriptionVideo" class="form-label fw-semibold">Description</label>
                        <textarea class="form-control" id="descriptionVideo" rows="6" style="resize: none;" name="description"
                            required>{{ $video->description }}</textarea>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ url()->previous() }}" class="btn text-white fw-bold"
                        style="border: 2px solid white;">Cancel</a>
                    <button type="submit" class="btn bg-white text-black fw-bold">Upload</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        const videoInput = document.getElementById('videoInput');
        const videoPreview = document.getElementById('videoPreview');
        const durationInput = document.getElementById('duration');
        const formatInput = document.getElementById('format');
        const defaultImage = document.getElementById('defaultImage');

        videoInput.addEventListener('change', function(e) {
            const file = e.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(event) {
                    videoPreview.style.display = 'block';
                    videoPreview.src = event.target.result;
                    defaultImage.style.display = 'none'; // Hide the default image when video is selected

                    // Load video metadata to get duration
                    const video = document.createElement('video');
                    video.preload = 'metadata';
                    video.onloadedmetadata = function() {
                        window.URL.revokeObjectURL(video.src);
                        const duration = video.duration;
                        const minutes = Math.floor(duration / 60);
                        const seconds = Math.floor(duration % 60);
                        durationInput.value = `${minutes}:${seconds.toString().padStart(2, '0')}`;
                        durationInput.value = duration ?
                            `${minutes}:${seconds.toString().padStart(2, '0')}` : '-';
                    };

                    video.src = URL.createObjectURL(file);

                    // Get file format extension
                    const format = file.name.split('.').pop();
                    formatInput.value = `.${format}`;
                };

                reader.readAsDataURL(file);
            } else {
                // If no file selected, show the default image and hide the video
                videoPreview.style.display = 'none';
                defaultImage.style.display = 'block';

                // Reset duration and format inputs
                durationInput.value = '-';
                formatInput.value = '';
            }
        });
    </script>

    <script>
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');

        imageInput.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener('load', function() {
                    imagePreview.src = reader.result;
                });

                reader.readAsDataURL(file);
            }
        });

        imageInput.addEventListener('input', function() {
            const file = this.files[0];

            if (file) {
                const fileSize = file.size / 1024 / 1024; // Convert to MB
                const img = new Image();

                img.src = URL.createObjectURL(file);

                img.onload = function() {
                    const width = img.width;
                    const height = img.height;

                    if (width === 1280 && height === 720 && fileSize <= 2) {
                        // Valid image
                        // You can add additional logic here, such as displaying success message, enabling submit button, etc.
                    } else {
                        // Invalid image
                        imageInput.value = ''; // Clear the file input field
                        imagePreview.src =
                            '{{ asset('images/default-thumbnail.png') }}'; // Reset the preview image

                        if (width !== 1280 || height !== 720) {
                            alert(
                                'Invalid image dimensions. Please select an image with dimensions 1280 x 720 pixels.'
                            );
                        }

                        if (fileSize > 2) {
                            alert('Invalid image size. Please select an image with a maximum size of 2MB.');
                        }
                        // You can add additional logic here, such as displaying an error message, disabling submit button, etc.
                    }
                };
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "-- Search Game --",
                allowClear: true,
            });
        });
    </script>
@endsection

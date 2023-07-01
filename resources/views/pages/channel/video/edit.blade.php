@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex gap-2 h5">
            <a href="{{ url()->previous() }}" class="nav-link">My Channel</a>
            <h5>></h5>
            <a href="{{ route('mychannel.video.create') }}" class="nav-link">Add Video</a>
        </div>

        <form action="" method="POST">
            @csrf

            <div class="d-flex flex-column justify-content-between gap-3">
                <div class="card card-body text-black bg-card" style="background-color: #a8b8d0;">
                    <div class="d-flex flex-row justify-content-between align-content-center align-items-center mb-3">
                        <h3 class="fw-bold m-0">Upload Video</h3>
                        <div class="d-flex flex-row gap-4">
                            <div class="d-flex flex-row align-items-center gap-2">
                                <i class="fas fa-eye"></i>
                                <span class="fw-semibold">123,456 views</span>
                            </div>

                            <div class="d-flex flex-row align-items-center gap-2">
                                <i class="fas fa-clock"></i>
                                <span class="fw-semibold" title="12 January 2023">3 days ago</span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-between gap-3">
                        <img id="defaultImage" class="rounded shadow-sm" src="{{ asset('images/default-video.png') }}"
                            style="width: 75%; height: 26.5rem; object-fit: cover;">
                        <video id="videoPreview" class="rounded" controls
                            style="display: none; width: 75%; height: 26.5rem; object-fit: cover;"></video>

                        <div class="card card-body" style="width: 25%;">
                            <div class="mb-3 d-flex flex-column">
                                <label for="imageInput" class="form-label fw-semibold">Select thumbnail:</label>
                                <img class="rounded shadow-sm mb-2" id="imagePreview"
                                    src="{{ asset('images/default-thumbnail.png') }}" alt="Image Preview"
                                    style="width: 100%; height: 10rem;object-fit: cover;">
                                <input type="file" class="form-control" id="imageInput" accept="image/*">
                            </div>

                            <div class="form-outline mb-3">
                                <label class="form-label fw-semibold" for="visibility">Visibility</label>
                                <select class="form-select" name="visibility" id="visibility">
                                    <option value="" disabled selected>-- Choose Visibility --</option>
                                    <option value="Public">Public</option>
                                    <option value="Private">Private</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <h6><strong>Duration:</strong></h6>
                                </div>
                                <div class="col">
                                    <h6><span id="duration"></span></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <h6><strong>Format:</strong></h6>
                                </div>
                                <div class="col">
                                    <h6><span id="format"></span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input class="form-control" type="file" id="videoInput" name="video" accept="video/*">
                </div>

                <div class="card card-body text-black" style="background-color: #a8b8d0;">
                    <div class="form-outline mb-3">
                        <label class="form-label fw-semibold" for="titleVideo">Title</label>
                        <input type="text" id="titleVideo" class="form-control"
                            placeholder="Stunning Mobile Legends Hero" />
                    </div>

                    <div class="form-outline mb-3">
                        <label class="form-label fw-semibold" for="categoryVideo">Category</label>
                        <select class="form-select" aria-label="Default select example" id="categoryVideo">
                            <option value="" selected disabled>-- Choose Category --</option>
                            <option value="Console">Console</option>
                            <option value="PC">PC</option>
                            <option value="Mobile">Mobile</option>
                        </select>
                    </div>

                    <div class="form-outline">
                        <label for="descriptionVideo" class="form-label fw-semibold">Description</label>
                        <textarea class="form-control" id="descriptionVideo" rows="6" style="resize: none;"
                            placeholder="Enter video description..."></textarea>
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
        const defaultImage = document.getElementById('defaultImage');
        const durationSpan = document.getElementById('duration');
        const formatSpan = document.getElementById('format');

        videoInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            const fileURL = URL.createObjectURL(file);
            videoPreview.src = fileURL;
            videoPreview.style.display = 'block';
            defaultImage.style.display = 'none';

            // Load video metadata to get duration
            videoPreview.onloadedmetadata = function() {
                const duration = videoPreview.duration;
                const minutes = Math.floor(duration / 60);
                const seconds = Math.floor(duration % 60);
                durationSpan.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
                durationSpan.style.display = 'block';
            };

            // Get file format extension
            const format = file.name.split('.').pop();
            formatSpan.textContent = `.${format}`;
            formatSpan.style.display = 'block';
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
    </script>
@endsection

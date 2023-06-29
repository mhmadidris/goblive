@extends('layouts.app')

@section('content')
    <div class="container">
        <nav class="d-flex gap-2">
            <a href="{{ url()->previous() }}" class="nav-link">My Channel</a>
            <h5>/</h5>
            <a href="{{ route('mychannel.video.create') }}" class="nav-link">Add Video</a>
        </nav>

        <form action="" method="POST">
            @csrf

            <div class="d-flex flex-column gap-3">
                <div class="card card-body text-black" style="background-color: #a8b8d0;">
                    <h3 class="fw-bold mb-4">Edit Video</h3>
                    <div class="mb-3 d-flex justify-content-center align-items-center">
                        <img id="defaultImage" class="rounded"
                            src="https://images.unsplash.com/photo-1470240731273-7821a6eeb6bd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80"
                            style="width: 50%;">
                        <video id="videoPreview" class="rounded" controls style="display: none; width: 50%;"></video>
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
                        <textarea class="form-control" id="descriptionVideo" rows="6" style="resize: none;"></textarea>
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

        videoInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            const fileURL = URL.createObjectURL(file);
            videoPreview.src = fileURL;
            videoPreview.style.display = 'block';
            defaultImage.style.display = 'none';
        });
    </script>
@endsection

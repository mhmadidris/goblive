@extends('layouts.app')

@section('content')
    <style>
        .bg-custom {
            background: linear-gradient(112.1deg, rgb(32, 38, 57) 11.4%, rgb(63, 76, 119) 70.2%);
        }
    </style>

    <div class="bg-black">
        <video src="{{ asset('storage/' . $video->video) }}" class="px-4" controls autoplay
            style="height: 75vh; width: 100%;"></video>
    </div>
    <div class="px-4 py-2">
        <div class="container-fluid">
            <div class="d-flex flex-row gap-4">
                <div class="w-100 d-flex flex-column">
                    <h2 class="fw-bold" style="text-align: justify;">{{ $video->title }}
                    </h2>

                    <div class="mt-3 d-flex justify-content-between">
                        <div class="d-flex flex-row gap-4">
                            <div class="d-flex flex-row align-content-center align-items-center gap-1 text-gray-800">
                                <i class="fas fa-clock"></i>
                                <span title="{{ $video->created_at }}">
                                    {{ $video->created_at->diffForHumans(null, true) }} ago
                                </span>
                            </div>

                            <div class="d-flex flex-row align-content-center align-items-center gap-1 text-gray-800">
                                <i class="fas fa-eye"></i>
                                <span>{{ number_format($video->views) }} views</span>
                            </div>

                            {{-- <div class="d-flex flex-row align-content-center align-items-center gap-1 text-gray-800">
                            <i class="fas fa-comment"></i>
                            <span>23 comments</span>
                        </div> --}}

                            <div class="d-flex flex-row align-content-center align-items-center gap-1 text-gray-800">
                                <i class="fas fa-hashtag"></i>
                                <span>{{ $video->category }}</span>
                            </div>
                        </div>
                        @if (Auth::user() && $video->user_id != Auth::user()->id)
                            <div>
                                <button class="btn btn-sm rounded-pill" style="background-color: #a8b8d0;"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fas fa-share"></i>
                                    Share
                                </button>
                            </div>
                        @endif
                    </div>
                    <hr>
                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex flex-row justify-content-between align-content-center align-items-center">
                            <div class="d-flex flex-row align-content-center align-items-center gap-2">
                                <img class="rounded-circle shadow" style="width: 3.5rem; height: 3.5rem; object-fit: cover;"
                                    src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80"
                                    alt="avatar">
                                <div class="d-flex flex-column">
                                    <h5 class="fw-bold">{{ ucfirst($channel->name) }}</h5>
                                    {{-- <p class="fw-medium p-0 m-0">123 Subscribers</p> --}}
                                </div>
                            </div>
                            <div>
                                {{-- @if (Auth::user() && $video->user_id != Auth::user()->id)
                                    <button type="button" class="btn btn-sm btn-primary">Subscribe</button>
                                @elseif (Auth::user() && $video->user_id == Auth::user()->id)
                                    <a href="" class="btn btn-sm btn-primary">Edit Video</a>
                                @endif --}}
                            </div>
                        </div>

                        @if ($video->description != null)
                            <p style="text-align: justify;">
                                {{ $video->description }}
                            </p>
                        @else
                            <p style="text-align: center;">
                                No description info
                            </p>
                        @endif
                    </div>
                </div>

                <div class="card w-25 d-none" style="height: 27.5rem;">
                    asa
                </div>
            </div>

            <h4 class="fw-bold mt-4 mb-3">Another Video</h4>
            <div id="owl-video" class="owl-carousel owl-theme">
                @foreach ($otherVideo as $other)
                    @if ($other->url != $video->url)
                        <div class="item d-flex flex-column text-white">
                            <div class="position-relative">
                                <div class="px-2 py-1 position-absolute bottom-0 start-0 m-2 text-white rounded-pill"
                                    style="background-color: #353839;">
                                    <small>{{ $other->duration }}</small>
                                </div>
                                <img src="{{ asset('storage/' . $other->thumbnail) }}" alt="Thumbnail" class="rounded"
                                    style="width: 100%; height: 10rem; object-fit: cover;">
                            </div>
                            <a href="{{ $other->url }}" class="nav-link">
                                <h5 class="fw-bold mt-2">{{ $other->title }}</h5>
                            </a>
                            <div class="d-flex align-items-center gap-2">
                                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                                    style="width: 25px;" alt="Avatar" />
                                <h6 class="m-0 fw-semibold">{{ $other->name }}</h6>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal Share -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-custom">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Share this video</h1>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>Share:</h6>
                    <div id="owl-share" class="owl-carousel owl-theme">
                        <div class="item text-center">
                            <button class="btn bg-primary rounded-circle" title="Copy URL"
                                style="width: 50px; height: 50px;"
                                onclick="copyUrl('{{ route('mychannel.video.show', $video->url) }}')">
                                <i class="fas fa-link"></i>
                            </button>
                        </div>

                        <div class="item text-center">
                            <button class="btn rounded-circle" style="background-color: #25D366; width: 50px; height: 50px;"
                                title="Share to Whatsapp"
                                onclick="sendToWhatsApp('{{ route('mychannel.video.show', $video->url) }}')">
                                <i class="fab fa-whatsapp"></i>
                            </button>
                        </div>

                        <div class="item">
                            <button class="btn bg-primary rounded-circle" style="width: 50px; height: 50px;"
                                title="Send to Email"
                                onclick="sendToEmail('{{ route('mychannel.video.show', $video->url) }}')">
                                <i class="fas fa-envelope"></i>
                            </button>
                        </div>

                        <div class="item">
                            <button class="btn rounded-circle" style="background-color: #00acee; width: 50px; height: 50px;"
                                title="Share to Twitter"
                                onclick="shareOnTwitter('{{ route('mychannel.video.show', $video->url) }}')">
                                <i class="fab fa-twitter"></i>
                            </button>
                        </div>

                        <div class="item">
                            <button class="btn rounded-circle"
                                style="background-color: #4267B2; width: 50px; height: 50px;" title="Share to Facebook"
                                onclick="shareOnFacebook('{{ route('mychannel.video.show', $video->url) }}')">
                                <i class="fab fa-facebook-f"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyUrl(url) {
            /* Create a temporary input element */
            var tempInput = document.createElement("input");

            /* Set the value of the temporary input to the URL */
            tempInput.setAttribute("value", url);

            /* Append the temporary input to the document */
            document.body.appendChild(tempInput);

            /* Select the text in the temporary input */
            tempInput.select();
            tempInput.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text to the clipboard */
            document.execCommand("copy");

            /* Remove the temporary input from the document */
            document.body.removeChild(tempInput);

            /* Optionally, display a success message */
            alert("URL copied to clipboard!");
        };

        function sendToWhatsApp(url) {
            // Construct the WhatsApp share URL
            var shareUrl = "https://wa.me/?text=" + encodeURIComponent(url);

            // Open the WhatsApp share URL in a new window or tab
            window.open(shareUrl, "_blank");
        };

        function sendToEmail(url) {
            // Construct the email URL
            var emailUrl = "mailto:?subject=Check out this video&body=" + encodeURIComponent(url);

            // Open the email URL in a new window or tab
            window.open(emailUrl, "_blank");
        };

        function shareOnTwitter(url) {
            // Construct the Twitter share URL
            var tweetUrl = "https://twitter.com/intent/tweet?url=" + encodeURIComponent(url);

            // Open the Twitter share URL in a new window or tab
            window.open(tweetUrl, "_blank");
        };

        function shareOnFacebook(url) {
            // Construct the Facebook share URL
            var shareUrl = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(url);

            // Open the Facebook share URL in a new window or tab
            window.open(shareUrl, "_blank");
        };
    </script>
@endsection

@extends('layouts.app')

@section('content')
    <style>
        .bg-custom {
            background: linear-gradient(112.1deg, rgb(32, 38, 57) 11.4%, rgb(63, 76, 119) 70.2%);
        }
    </style>

    <div class="px-5 d-flex flex-row gap-3" style="height: 75vh;">
        <iframe src="https://www.youtube.com/embed/{{ $livestream->id }}?autoplay=1" class="rounded w-100" allowfullscreen
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"></iframe>

        {{-- <div id="liveChat" class="card card-body bg-custom text-black">
            <h1>Live Chat</h1>

            <div class="mb-3">
                @foreach ($liveChatMessages as $message)
                    <div class="mb-3">
                        <p class="fw-medium p-0 m-0">{{ $message->snippet->authorDisplayName }}</p>
                        <p class="p-0 m-0">{{ $message->snippet->displayMessage }}</p>
                    </div>
                @endforeach
            </div>
        </div> --}}
    </div>

    <div class="px-4 py-2">
        <div class="container-fluid">
            <div class="d-flex flex-row gap-4">
                <div class="w-100 d-flex flex-column">
                    <h2 class="fw-bold" style="text-align: justify;">{{ $livestream->snippet->title }}</h2>

                    <div class="mt-3 d-flex justify-content-between">
                        <div class="d-flex flex-row gap-4">
                            <div class="d-flex flex-row align-content-center align-items-center gap-1 text-gray-800">
                                <i class="fas fa-clock"></i>
                                <span title="{{ $livestream->snippet->publishedAt }}">
                                    {{ \Carbon\Carbon::parse($livestream->snippet->publishedAt)->diffForHumans() }}
                                </span>
                            </div>

                            {{-- @if ($livestream->statistics)
                                <div class="d-flex flex-row align-content-center align-items-center gap-1 text-gray-800">
                                    <i class="fas fa-eye"></i>
                                    <span>{{ number_format($livestream->statistics->viewCount) }} views</span>
                                </div>
                            @else
                                <div class="d-flex flex-row align-content-center align-items-center gap-1 text-gray-800">
                                    <i class="fas fa-eye"></i>
                                    <span>View count not available</span>
                                </div>
                            @endif --}}

                            <div class="d-flex flex-row align-content-center align-items-center gap-1 text-gray-800">
                                <i class="fas fa-hashtag"></i>
                                <span>{{ $categoryName }}</span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex flex-row justify-content-between align-content-center align-items-center">
                            <div class="d-flex flex-row align-content-center align-items-center gap-2">
                                <img class="rounded-circle shadow" style="width: 3.5rem; height: 3.5rem; object-fit: cover;"
                                    src="{{ $channelAvatar }}" alt="avatar">
                                <div class="d-flex flex-column">
                                    <h5 class="fw-bold">{{ ucfirst($livestream->snippet->channelTitle) }}</h5>
                                    <p class="fw-medium p-0 m-0">{{ number_format($subscriberCount) }} Subscribers</p>
                                </div>
                            </div>
                            <div>
                                {{-- @if (Auth::user() && $livestream->snippet->channelId != Auth::user()->id)
                                    <button type="button" class="btn btn-sm btn-primary">Subscribe</button>
                                @elseif (Auth::user() && $livestream->snippet->channelId == Auth::user()->id)
                                    <a href="" class="btn btn-sm btn-primary">Edit Video</a>
                                @endif --}}
                            </div>
                        </div>

                        @if ($livestream->snippet->description != null)
                            <p style="text-align: left;">
                                {!! $livestream->snippet->description !!}
                            </p>
                        @else
                            <p style="text-align: center;">
                                No description info
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Share -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <button class="btn rounded-circle" style="background-color: #4267B2; width: 50px; height: 50px;"
                                title="Share to Facebook"
                                onclick="shareOnFacebook('{{ route('mychannel.video.show', $video->url) }}')">
                                <i class="fab fa-facebook-f"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection






{{-- <div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>{{ $livestream->snippet->title }}</h2>
            <p>{{ $livestream->snippet->description }}</p>
            <p>Channel: {{ $livestream->snippet->channelTitle }}</p>
            <p>Published At: {{ $livestream->snippet->publishedAt }}</p>
        </div>
        <div class="col-md-6">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $livestream->id }}"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div> --}}

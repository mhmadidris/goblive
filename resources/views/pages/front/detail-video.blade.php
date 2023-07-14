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
    <div class="container-fluid px-4 py-2 d-flex flex-row gap-4">
        <div class="w-100">
            <div class="d-flex flex-row gap-4">
                <div class="w-100 d-flex flex-column">
                    <h2 class="fw-bold" style="text-align: justify;">{{ $video->title }}
                    </h2>

                    <div class="mt-3 d-flex justify-content-between">
                        <div class="d-flex flex-row gap-4">
                            <div class="d-flex flex-row align-content-center align-items-center gap-1 text-gray-800">
                                <i class="fas fa-clock"></i>
                                <span title="{{ $video->created_at }}">
                                    {{ $video->created_at->diffForHumans() }}
                                </span>
                            </div>

                            <div class="d-flex flex-row align-content-center align-items-center gap-1 text-gray-800">
                                <i class="fas fa-eye"></i>
                                <span>{{ number_format($video->views) }} Views</span>
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
                        @if (Auth::user())
                            <div>
                                @if (Auth::user()->id != $video->channel_id)
                                    <button class="btn btn-sm rounded-pill" style="background-color: #a8b8d0;"
                                        data-bs-toggle="modal" data-bs-target="#modalDonate">
                                        <i class="fas fa-donate"></i>
                                        Donate
                                    </button>
                                @endif

                                <button class="btn btn-sm rounded-pill" style="background-color: #a8b8d0;"
                                    data-bs-toggle="modal" data-bs-target="#modalShare">
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
                                    src="{{ asset('storage/' . \App\Models\Channel::where('user_id', $channel->user_id)->value('avatar')) }}"
                                    alt="avatar">
                                <div class="d-flex flex-column">
                                    <a href="{{ route('channel.show', $channel->username) }}" class="nav-link">
                                        <h6 class="fw-bold">{{ ucfirst($channel->name) }}</h6>
                                    </a>
                                    <livewire:count-subscribers :channelId="$channel->id" />
                                </div>
                            </div>

                            @if (Auth::user() && $myChannel->id != $channel->id)
                                <livewire:subscriber :channelId="$channel->id" />
                            @endif
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
            </div>

            @livewire('comment-section', ['video' => $video])
        </div>

        {{-- @if (count($otherVideo) > 0)
            <div class="d-flex flex-column gap-3">
                @foreach ($otherVideo as $other)
                    <a href="{{ $other->url }}" class="nav-link">
                        <div class="d-flex flex-row gap-2" style="width: 20rem;">
                            <img src="{{ asset('storage/' . $other->thumbnail) }}" alt="Thumbnail" class="rounded"
                                style="object-fit: cover; width: 7.5rem;">
                            <div class="d-flex flex-column">
                                <h5 class="fw-bold">{{ $other->title }}</h5>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif --}}
    </div>

    @include('pages.front.modal-detail')

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

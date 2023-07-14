<header>
    @if (\App\Models\Channel::where('user_id', Auth::user()->id)->value('header') == null)
        <div class="position-relative">
            <img class="img-fluid w-100" src="{{ asset('images/header-bg.jpg') }}" alt="Thumbnail"
                style="height: 35vh; object-fit: cover;">
            <div class="position-absolute bottom-0 end-0 mx-4 my-2 p-2 btn-color rounded d-flex flex-row justify-content-center align-items-center align-content-center gap-2 shadow"
                style="color: #FCD411;">
                <i class="fas fa-coins"></i>
                <h5 class="fw-bold m-0">{{ number_format($myChannel->coin) }} Coins</h5>
            </div>
        </div>
    @else
        <div class="position-relative">
            <img class="img-fluid w-100"
                src="{{ asset('storage/' . \App\Models\Channel::where('user_id', Auth::user()->id)->value('header')) }}"
                alt="Thumbnail" style="height: 35vh; object-fit: cover;">
            <div class="position-absolute bottom-0 end-0 p-3">
                <span class="text-white">Your Text Here</span>
            </div>
        </div>
    @endif
    <div class="container d-flex flex-row justify-content-between align-items-center my-4">
        <div class="d-flex flex-row align-items-center gap-4">
            <img class="rounded-circle shadow"
                src="{{ asset('storage/' . \App\Models\Channel::where('user_id', Auth::user()->id)->value('avatar')) }}"
                alt="avatar" style="width: 100px; height: 100px; object-fit: cover; border: 2px solid white">
            <div class="d-flex flex-column">
                <h2 class="fw-bold m-0">{{ Auth::user()->name }}</h2>
                <h6 class="text-gray-300">{{ '@' . $myChannel->username }}</h6>
                <livewire:count-subscribers :channelId="$myChannel->id" />
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

    <nav class="container d-flex justify-content-center gap-5 p-0">
        <a href="{{ route('mychannel.index') }}"
            class="nav-link {{ Request::is('mychannel') ? 'nav-channel-active' : '' }}">
            OVERVIEW
        </a>
        <a href="{{ route('mychannel.myVideos') }}"
            class="nav-link {{ Request::is('mychannel/videos') ? 'nav-channel-active' : '' }}">
            VIDEOS
        </a>
        <a href="{{ route('mychannel.coins.index') }}"
            class="nav-link {{ Request::is('mychannel/history') ? 'nav-channel-active' : '' }}">
            HISTORY
        </a>
        <a href="{{ route('mychannel.myAbout') }}"
            class="nav-link {{ Request::is('mychannel/about') ? 'nav-channel-active' : '' }}">
            ABOUT
        </a>
    </nav>
    <hr class="hr m-0" />
</header>

<header>
    @if (\App\Models\Channel::where('user_id', Auth::user()->id)->value('header') == null)
        <div class="position-relative">
            <img class="img-fluid w-100" src="{{ asset('images/header-bg.jpg') }}" alt="Thumbnail"
                style="height: 35vh; object-fit: cover;">
            <div class="position-absolute bottom-0 end-0 mx-4 my-2 d-flex flex-row gap-2">
                <div class="p-2 btn-color rounded d-flex flex-row justify-content-center align-items-center align-content-center gap-2 shadow"
                    style="color: #FCD411;">
                    <i class="fas fa-coins"></i>
                    <h5 class="fw-bold m-0">{{ number_format($myChannel->coin) }} Coins</h5>
                </div>
                <a href="{{ route('coins.topupCoinView') }}"
                    class="btn rounded d-flex flex-row justify-content-center align-items-center align-content-center gap-2 shadow"
                    style="background-color: #FCD411;">
                    <h5 class="fw-bold m-0">Topup Coin</h5>
                </a>
            </div>
        </div>
    @else
        <div class="position-relative">
            <img class="img-fluid w-100"
                src="{{ asset('storage/' . \App\Models\Channel::where('user_id', Auth::user()->id)->value('header')) }}"
                alt="Thumbnail" style="height: 35vh; object-fit: cover;">
            <div class="position-absolute bottom-0 end-0 mx-4 my-2 p-2 btn-color rounded d-flex flex-row justify-content-center align-items-center align-content-center gap-2 shadow"
                style="color: #FCD411;">
                <i class="fas fa-coins"></i>
                <h5 class="fw-bold m-0">{{ number_format($myChannel->coin) }} Coins</h5>
            </div>
        </div>
    @endif
    <div class="container-md container-fluid d-flex flex-row justify-content-between align-items-center my-4">
        <div class="d-flex flex-row align-items-center gap-2">
            <img class="rounded-circle shadow"
                src="{{ asset('storage/' . \App\Models\Channel::where('user_id', Auth::user()->id)->value('avatar')) }}"
                alt="avatar" style="width: 5rem; height: 5rem; object-fit: cover; border: 2px solid white">
            <div class="d-flex flex-column">
                <h4 class="fw-bold m-0">{{ Auth::user()->name }}</h4>
                <h6 class="text-gray-300">{{ '@' . $myChannel->username }}</h6>
                <livewire:count-subscribers :channelId="$myChannel->id" />
            </div>
        </div>

        <div class="d-flex flex-column gap-2">
            <div class="d-flex flex-row gap-2">
                <button type="button" data-bs-toggle="modal" data-bs-target="#linkShop"
                    class="btn d-flex flex-row align-items-center gap-2 bg-btn-color justify-content-center w-75">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="d-none d-md-block">Shop</span>
                </button>
                <button type="button" data-bs-toggle="modal" data-bs-target="#editProfile"
                    class="btn bg-btn-color w-25">
                    <i class="fas fa-edit"></i>
                </button>
            </div>
            <a href="{{ route('mychannel.video.create') }}"
                class="btn d-flex flex-row align-items-center gap-2 bg-btn-color justify-content-center">
                <i class="fas fa-plus"></i>
                <span class="d-none d-md-block">Upload new video</span>
            </a>
        </div>
    </div>

    <nav
        class="container-md container-fluid d-flex justify-content-md-center justify-content-around p-0 gap-md-5 gap-0">
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

<header>
    @if (\App\Models\Channel::where('user_id', $channel->id)->value('header') == null)
        <div class="position-relative">
            <img class="img-fluid w-100" src="{{ asset('images/header-bg.jpg') }}" alt="Thumbnail"
                style="height: 35vh; object-fit: cover;">
        </div>
    @else
        <div class="position-relative">
            <img class="img-fluid w-100"
                src="{{ asset('storage/' . \App\Models\Channel::where('user_id', $channel->id)->value('header')) }}"
                alt="Thumbnail" style="height: 35vh; object-fit: cover;">
        </div>
    @endif
    <div class="container-md container-fluid d-flex flex-row justify-content-between align-items-center my-4">
        <div class="d-flex flex-row align-items-center gap-2">
            <img class="rounded-circle shadow"
                src="{{ asset('storage/' . \App\Models\Channel::where('user_id', $channel->id)->value('avatar')) }}"
                alt="avatar" style="width: 5rem; height: 5rem; object-fit: cover; border: 2px solid white">
            <div class="d-flex flex-column">
                <h4 class="fw-bold m-0">{{ $channel->name }}</h4>
                <h6 class="text-gray-300">{{ '@' . $channel->username }}</h6>
                <livewire:count-subscribers :channelId="$channel->id" />
            </div>
        </div>

        @if (Auth::user())
            @php
                $myChannel = \App\Models\Channel::where('user_id', Auth::user()->id)->first();
            @endphp
            @if ($myChannel->id != $channel->id)
                <livewire:subscriber :channelId="$channel->id" />
            @endif
        @endif
    </div>

    <nav
        class="container-md container-fluid d-flex justify-content-md-center justify-content-around p-0 gap-md-5 gap-0">
        <a href="{{ route('channel.show', $channel->username) }}"
            class="nav-link {{ Request::is('channel/' . $channel->username) ? 'nav-channel-active' : '' }}">
            OVERVIEW
        </a>
        <a href="{{ route('channel.channelVideos', $channel->username) }}"
            class="nav-link {{ Request::is('channel/' . $channel->username . '/videos') ? 'nav-channel-active' : '' }}">
            VIDEOS
        </a>
        <a href="{{ route('channel.channelAbout', $channel->username) }}"
            class="nav-link {{ Request::is('channel/' . $channel->username . '/about') ? 'nav-channel-active' : '' }}">
            ABOUT
        </a>
    </nav>

    <hr class="hr m-0" />
</header>

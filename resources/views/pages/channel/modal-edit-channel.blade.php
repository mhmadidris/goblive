<!-- Modal Edit Profile -->
<div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-modal text-black">
            <form action="{{ route('mychannel.update', $myChannel->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileLabel">Edit Channel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="header" class="form-label fw-semibold m-0">Header</label>
                        <div id="headerPreview">
                            @if (\App\Models\Channel::where('user_id', Auth::user()->id)->value('header') == null)
                                <img class="rounded w-100 my-2 shadow-sm" src="{{ asset('images/header-bg.jpg') }}"
                                    style="height: 10rem; object-fit: cover;">
                            @else
                                <img class="rounded w-100 my-2 shadow-sm"
                                    src="{{ asset('storage/' . \App\Models\Channel::where('user_id', Auth::user()->id)->value('header')) }}"
                                    style="height: 10rem; object-fit: cover;">
                            @endif
                        </div>
                        <input type="file" class="form-control" id="header" name="header" accept="image/*"
                            onchange="previewHeader(event)">
                    </div>

                    <div class="mb-3">
                        <div class="d-flex flex-column">
                            <label for="avatar" class="form-label fw-semibold m-0">Avatar</label>
                            <div class="text-center" id="avatarPreview">
                                <img class="rounded-circle my-2 shadow-sm"
                                    src="{{ asset('storage/' . \App\Models\Channel::where('user_id', Auth::user()->id)->value('avatar')) }}"
                                    style="width: 10rem; height: 10rem; object-fit: cover;">
                            </div>
                        </div>
                        <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*"
                            onchange="previewAvatar(event)">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold m-0">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ Auth::user()->name }}" placeholder="ex: John Smith">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold m-0">Email</label>
                        <input type="text" class="form-control" id="email" name="email"
                            value="{{ Auth::user()->email }}" disabled placeholder="ex: john@email.com">
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label fw-semibold m-0">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="{{ $myChannel->username }}" placeholder="@admin">
                    </div>

                    <div class="mb-3">
                        <label for="country" class="form-label fw-semibold m-0">Country</label>
                        <select class="form-select" id="country" name="lokasi">
                            <option value="" selected disabled>-- Choose Country --</option>
                            @foreach ($countries as $name)
                                <option value="{{ $name }}" {{ $name == $myChannel->lokasi ? 'selected' : '' }}>
                                    {{ $name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="bio" class="form-label fw-semibold m-0">Bio</label>
                        <textarea class="form-control" id="bioForm" rows="4" style="resize: none;" name="bio"
                            placeholder="ex: Professional games streamer...">{{ $myChannel->bio }}</textarea>
                    </div>

                    <hr class="hr" />

                    <h4 class="text-center fw-bold">Shop</h4>

                    <div class="input-group my-3">
                        <span class="input-group-text" id="inputGroup-sizing-default1">
                            <img src="{{ asset('images/shop/shoope.svg') }}" width="75" alt="">
                        </span>
                        <input type="url" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" placeholder="Enter a Shopee URL"
                            name="shoopeLink" pattern="https?://.*" autocomplete="off"
                            value="{{ $linkShop->shoope_link }}">
                    </div>
                    <div class="input-group my-3">
                        <span class="input-group-text" id="inputGroup-sizing-default2">
                            <img src="{{ asset('images/shop/tokopedia.svg') }}" width="75" alt="">
                        </span>
                        <input type="url" class="form-control" aria-label="Sizing example input"
                            name="tokopediaLink" aria-describedby="inputGroup-sizing-default"
                            placeholder="Enter a Tokopedia URL" pattern="https?://.*" autocomplete="off"
                            value="{{ $linkShop->tokopedia_link }}">
                    </div>
                    <div class="input-group my-3">
                        <span class="input-group-text" id="inputGroup-sizing-default3">
                            <img src="{{ asset('images/shop/bukalapak.svg') }}" width="75" alt="">
                        </span>
                        <input type="url" class="form-control" aria-label="Sizing example input"
                            name="bukalapakLink" aria-describedby="inputGroup-sizing-default"
                            placeholder="Enter a Bukalapak URL" pattern="https?://.*" autocomplete="off"
                            value="{{ $linkShop->bukalapak_link }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

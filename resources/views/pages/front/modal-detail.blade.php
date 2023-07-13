<!-- Modal Share -->
<div class="modal fade" id="modalShare" tabindex="-1" aria-labelledby="modalShareLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-custom">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalShareLabel">Share this video</h1>
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
</div>


<!-- Modal Donate -->
<div class="modal fade" id="modalDonate" tabindex="-1" aria-labelledby="modalDonateLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-custom">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalDonateLabel">Donate this video</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex flex-column justify-content-center align-items-center align-content-center">
                    <div>
                        <div class="card d-inline-block p-2 shadow">
                            {!! $qrCode !!}
                        </div>
                    </div>
                    <div class="mt-3 text-center">
                        <h5 class="fw-bold">Scan QR Code to send coins</h5>
                        <small>QR Code not working? <a href="{{ $url }}" class="nav-item text-white fw-bold"
                                style="text-decoration: underline;">Click this
                                link</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

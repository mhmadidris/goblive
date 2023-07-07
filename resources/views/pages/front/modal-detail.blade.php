<!-- Modal Comments -->
<div class="modal fade" id="modalComment" tabindex="-1" aria-labelledby="modalCommentLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-custom">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalCommentLabel">Comments</h1>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex flex-column align-items-center gap-2">
                    <!-- Existing comments will be displayed here -->
                    <div id="commentsContainer">
                        @foreach ($comments as $comment)
                            <div class="d-flex flex-row w-100">
                                <img src="{{ asset('storage/' . \App\Models\Channel::where('user_id', $comment->user_id)->value('avatar')) }}"
                                    alt="Avatar" class="rounded-circle mx-2"
                                    style="width: 40px; height: 40px; border: 2px solid white;">
                                <div class="d-flex flex-column gap-1 w-100">
                                    <div class="d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="fw-bold">{{ $comment->name }}</h6>
                                        <h6 class="text-white fw-medium">
                                            {{ $comment->created_at->timezone('Asia/Jakarta')->diffForHumans() }}</h6>
                                    </div>
                                    <p>{{ $comment->comment }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="commentForm">
                <div class="modal-footer">
                    <form id="commentSubmitForm" action="{{ route('comments.store') }}" method="POST"
                        class="d-flex flex-row gap-2 w-100">
                        @csrf
                        <input type="hidden" name="video_id" class="form-control" autocomplete="off"
                            value="{{ $video->id }}">
                        <input type="text" name="comment" class="form-control" placeholder="Type your comment"
                            autocomplete="off">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Function to fetch and display comments
        function fetchComments() {
            // Make an AJAX request to retrieve comments
            $.ajax({
                url: '{{ route('comments.fetch') }}', // Replace with the actual route for fetching comments
                method: 'GET',
                success: function(response) {
                    // Check if comments exist
                    if (response && response.length > 0) {
                        // Show the comments container
                        $('#commentsContainer').show();
                        // Loop through the comments and append them to the container
                        response.forEach(function(comment) {
                            var commentElement = `
                                <div class="d-flex flex-row w-100">
                                    <img src="${comment.avatar}" alt="Avatar" class="rounded-circle mx-2" style="width: 40px; height: 40px; border: 2px solid white;">
                                    <div class="d-flex flex-column gap-1 w-100">
                                        <div class="d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="fw-bold">${comment.name}</h6>
                                            <h6 class="text-white fw-medium">${comment.created_at}</h6>
                                        </div>
                                        <p>${comment.comment}</p>
                                    </div>
                                </div>
                            `;
                            $('#commentsContainer').append(commentElement);
                        });
                    } else {
                        // Hide the comments container if no comments exist
                        $('#commentsContainer').hide();
                    }
                },
                error: function(xhr, status, error) {
                    // Handle the error response (optional)
                    console.log(xhr.responseText);
                }
            });
        }

        // Call the fetchComments function to display comments initially
        fetchComments();

        // Comment submission event handler
        $('#commentSubmitForm').on('submit', function(event) {
            event.preventDefault();

            var form = $(this);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                success: function(response) {
                    // Handle the success response (optional)
                    // For example, you can display a success message or update the comment list dynamically without refreshing the page.

                    // Clear the comment input field
                    form.find('input[name="comment"]').val('');

                    // Show the comments container
                    $('#commentsContainer').show();

                    // Append the new comment
                    var newComment = `
                        <div class="d-flex flex-row w-100">
                            <img src="${response.avatar}" alt="Avatar" class="rounded-circle mx-2" style="width: 40px; height: 40px; border: 2px solid white;">
                            <div class="d-flex flex-column gap-1 w-100">
                                <div class="d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="fw-bold">${response.name}</h6>
                                    <h6 class="text-white fw-medium">${response.created_at}</h6>
                                </div>
                                <p>${response.comment}</p>
                            </div>
                        </div>
                    `;

                    // Append the new comment to the comments container
                    $('#commentsContainer').append(newComment);
                },
                error: function(xhr, status, error) {
                    // Handle the error response (optional)
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>




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

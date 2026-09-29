<article class="comment position-relative py-4 pe-5">
    <header>
        <a class="post-comment-profile d-flex align-items-center gap-3 text-reset text-decoration-none" href="{{ $comment->user_id === null ? route('me') : route('user.show', $comment->user->id) }}">
            <img class="avatar avatar-sm rounded-circle border" src="{{ $comment->user->image ? asset('storage/' . $comment->user->image) : asset('images/profile-avatar.svg') }}" alt="{{ $comment->user->name }}'s profile picture" loading="lazy">
            <div>
                <h3 class="h6 mb-1">{{ $comment->user->name }}</h3>
                <p class="small text-body-secondary mb-0">{{ $comment->user->username_display }} · {{ $comment->formatted_created_at }}</p>
            </div>
        </a>
    </header>
    <p class="post-content small ms-5 mt-3 mb-0">{{ $comment->content }}</p>
    @auth
        @if (auth()->id() === $comment->user_id)
            <button class="comment-delete-button btn btn-sm d-inline-flex align-items-center justify-content-center rounded-circle" type="button" data-bs-toggle="modal" data-bs-target="#deleteCommentModal{{ $comment->id }}" aria-label="Delete comment" title="Delete comment">
                <i class="bi bi-trash3" aria-hidden="true"></i>
            </button>
        @endif
    @endauth

    @auth
    @if (auth()->id() === $comment->user_id)
    <div class="modal fade" id="deleteCommentModal{{ $comment->id }}" tabindex="-1" aria-labelledby="deleteCommentModalLabel{{ $comment->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 shadow">
                <div class="modal-header border-0 px-4 pt-4 pb-2">
                    <div class="d-flex align-items-center gap-3">
                        <span class="delete-modal-icon d-inline-flex align-items-center justify-content-center rounded-circle" aria-hidden="true">
                            <i class="bi bi-trash3"></i>
                        </span>
                        <h2 class="modal-title h5 fw-bold mb-0" id="deleteCommentModalLabel{{ $comment->id }}">Delete this comment?</h2>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 py-3 text-body-secondary">This action cannot be undone. The comment will be permanently removed.</div>
                <div class="modal-footer border-0 px-4 pt-0 pb-4">
                    <button class="btn btn-light border rounded-pill px-4" type="button" data-bs-dismiss="modal">Cancel</button>
                    <form class="m-0" action="{{ route('post.comments.destroy', ['id' => $comment->post_id, 'commentId' => $comment->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger rounded-pill px-4" type="submit">
                            <i class="bi bi-trash3 me-1" aria-hidden="true"></i>
                            Delete comment
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endauth
</article>

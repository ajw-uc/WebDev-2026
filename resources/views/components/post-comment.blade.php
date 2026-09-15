<article class="feed-comment">
    <div class="position-relative">
        <header class="feed-author">
            <a class="feed-author-link" href="{{ $comment->user_id === null ? route('me') : route('user.show', $comment->user->id) }}">
                <img class="feed-avatar comment-avatar" src="{{ $comment->user->image ? asset('storage/'.$comment->user->image) : asset('images/profile-avatar.svg') }}" width="36" height="36" alt="Foto profil {{ $comment->user->name }}" loading="lazy">
                <div>
                    <h3>{{ $comment->user->name }}</h3>
                    <p>{{ $comment->user->username_display }} · <?= $comment->formatted_created_at ?>@if ($comment->updated_at->ne($comment->created_at)) · updated <?= $comment->formatted_updated_at ?>@endif</p>
                </div>
            </a>
        </header>
        <p class="comment-content">{{ $comment->content }}</p>
        @can('delete', $comment)
        <button class="comment-delete-button" type="button" data-bs-toggle="modal" data-bs-target="#deleteCommentModal{{ $comment->id }}" aria-label="Delete comment" title="Delete comment">×</button>
        @endcan
    </div>

    @can('delete', $comment)
    <div class="modal fade" id="deleteCommentModal{{ $comment->id }}" tabindex="-1" aria-labelledby="deleteCommentModalLabel{{ $comment->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="deleteCommentModalLabel{{ $comment->id }}">Delete this comment?</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">This action cannot be undone.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{ route('post.comments.destroy', ['id' => $comment->post_id, 'commentId' => $comment->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete comment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endcan
</article>

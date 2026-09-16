<article class="feed-post">
    <header class="feed-author">
        <a class="feed-author-link" href="{{ route('user.show', $post->user_id) }}">
            <img class="feed-avatar feed-avatar-0" src="{{ $post->user->image ? asset('storage/'.$post->user->image) : asset('/images/profile-avatar.svg') }}" width="46" height="46" alt="Foto profil {{ $post->user->name }}" loading="lazy">
            <div>
                <h3>{{ $post->user->name }}</h3>
            <p>{{ $post->user->username_display }} · <?= $post->formatted_created_at ?>@if ($post->updated_at->ne($post->created_at)) · updated <?= $post->formatted_updated_at ?>@endif</p>
            </div>
        </a>
        <span class="feed-open-hint" aria-hidden="true">↗</span>
    </header>
    <p class="feed-content">
        <a class="feed-content-link" href="{{ route('post.show', $post->id) }}">
            {{ $post['content'] }}
        </a>
    </p>
    @if ($post->image)
        <button class="post-image-preview-trigger" type="button" data-bs-toggle="modal" data-bs-target="#postImagePreviewModal{{ $post->id }}" aria-label="Preview post image">
            <img class="post-image-thumbnail" src="{{ asset('storage/' . $post->image) }}" alt="Post image" loading="lazy">
        </button>
        <div class="modal fade" id="postImagePreviewModal{{ $post->id }}" tabindex="-1" aria-labelledby="postImagePreviewModalLabel{{ $post->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="postImagePreviewModalLabel{{ $post->id }}">Post image</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img class="post-image-preview" src="{{ asset('storage/' . $post->image) }}" alt="Larger preview of post image">
                    </div>
                </div>
            </div>
        </div>
    @endif
    <footer class="feed-stats">
        <span>♡ {{ $post->likes->count() }} likes</span>
        <a href="{{ route('post.show', $post->id) }}#comments">↳ {{ $post->comments->count() }} comments</a>
    </footer>
</article>

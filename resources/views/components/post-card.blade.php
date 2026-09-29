<article class="card post-card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">
        <header class="d-flex align-items-center gap-3">
            <a class="post-card-profile d-flex align-items-center gap-3 text-reset text-decoration-none stretched-link-layer" href="{{ route('user.show', $post->user->id) }}">
                <img class="avatar rounded-circle border" src="{{ asset('images/profile-avatar.svg') }}" alt="{{ $post->user->name }}'s profile picture" loading="lazy">
                <div>
                    <h3 class="h6 fw-bold mb-1">{{ $post->user->name }}</h3>
                    <p class="small text-body-secondary mb-0">{{ $post->user->usernameDisplay }} · {{ $post->formatted_created_at }}@if ($post->updated_at->ne($post->created_at)) · updated <?= $post->formatted_updated_at ?>@endif</p>
                </div>
            </a>
        </header>
        <p class="post-content my-4">
            <a class="text-reset text-decoration-none stretched-link" href="{{ route('post.show', $post->id) }}">{{ $post->content }}</a>
        </p>
        @if ($post->image)
            <button class="post-image-preview-trigger stretched-link-layer d-block p-0 mb-4 rounded-3 overflow-hidden" type="button" data-bs-toggle="modal" data-bs-target="#postImagePreviewModal{{ $post->id }}" aria-label="View full image from {{ $post->user->name }}'s post">
                <img class="post-image-thumbnail d-block" src="{{ asset('storage/' . $post->image) }}" alt="Image attached to {{ $post->user->name }}'s post" loading="lazy">
                <span class="post-image-preview-hint d-inline-flex align-items-center gap-1 rounded-pill px-2 py-1" aria-hidden="true">
                    <i class="bi bi-arrows-fullscreen"></i>
                    View
                </span>
            </button>
        @endif
        <footer class="d-flex align-items-center gap-2 position-relative">
            <a class="btn btn-light btn-sm rounded-pill px-3 stretched-link-layer">
                <i class="bi bi-heart me-1" aria-hidden="true"></i>
                {{ $post->likes->count() }} likes
            </a>
            <a class="btn btn-light btn-sm rounded-pill px-3 stretched-link-layer" href="{{ route('post.show', $post->id) }}#comments">
                <i class="bi bi-chat-left-text me-1" aria-hidden="true"></i>
                {{ $post->comments->count() }} comments
            </a>
        </footer>
    </div>
</article>

@if ($post->image)
    <div class="modal fade" id="postImagePreviewModal{{ $post->id }}" tabindex="-1" aria-labelledby="postImagePreviewModalLabel{{ $post->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content post-image-modal border-0 overflow-hidden shadow-lg">
                <div class="modal-header border-0">
                    <h2 class="modal-title h6 fw-semibold mb-0" id="postImagePreviewModalLabel{{ $post->id }}">{{ $post->user->name }}'s image</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0 text-center">
                    <img class="post-image-preview d-block mx-auto" src="{{ asset('storage/' . $post->image) }}" alt="Full-size image attached to {{ $post->user->name }}'s post">
                </div>
            </div>
        </div>
    </div>
@endif

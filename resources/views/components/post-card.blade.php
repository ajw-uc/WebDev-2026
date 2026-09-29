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

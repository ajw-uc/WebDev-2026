<article class="comment py-4">
    <header>
        <a class="post-comment-profile d-flex align-items-center gap-3 text-reset text-decoration-none" href="{{ $comment['author_id'] === null ? route('me') : route('user.show', $comment['author_id']) }}">
            <img class="avatar avatar-sm rounded-circle border" src="{{ asset('images/profile-avatar.svg') }}" alt="{{ $comment['author_name'] }}'s profile picture" loading="lazy">
            <div>
                <h3 class="h6 mb-1">{{ $comment['author_name'] }}</h3>
                <p class="small text-body-secondary mb-0">{{ $comment['time'] }}</p>
            </div>
        </a>
    </header>
    <p class="post-content small ms-5 mt-3 mb-0">{{ $comment['content'] }}</p>
</article>

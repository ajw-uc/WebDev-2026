<article class="feed-comment">
    <header class="feed-author">
        <a class="feed-author-link" href="{{ $comment->user_id === null ? route('me') : route('user.show', $comment->user->id) }}">
            <img class="feed-avatar comment-avatar" src="{{ asset('images/profile-avatar.svg') }}" width="36" height="36" alt="Foto profil {{ $comment->user->name }}" loading="lazy">
            <div>
                <h3>{{ $comment->user->name }}</h3>
                <p>{{ $comment->user->username_display }} · <?= $comment->formatted_created_at ?></p>
            </div>
        </a>
    </header>
    <p class="comment-content">{{ $comment->content }}</p>
</article>

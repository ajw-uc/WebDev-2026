<article class="feed-post">
    <header class="feed-author">
        <a class="feed-author-link" href="{{ route('user.show', $post['author_id']) }}">
            <img class="feed-avatar feed-avatar-0" src="{{ asset('/images/profile-avatar.svg') }}" width="46" height="46" alt="Foto profil {{ $post['author_name'] }}" loading="lazy">
            <div>
                <h3>{{ $post['author_name'] }}</h3>
                <p>{{ $post['author_username'] }} · {{ $post['time'] }}</p>
            </div>
        </a>
        <span class="feed-open-hint" aria-hidden="true">↗</span>
    </header>
    <p class="feed-content">
        <a class="feed-content-link" href="{{ route('post.show', $post['id']) }}">
            {{ $post['content'] }}
        </a>
    </p>
    <footer class="feed-stats">
        <span>♡ {{ $post['likes'] }} likes</span>
        <a href="{{ route('post.show', $post['id']) }}#comments">↳ {{ count($post['comments']) }} comments</a>
    </footer>
</article>

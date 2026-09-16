<article class="feed-comment">
    <header class="feed-author">
        <a class="feed-author-link" href="{{ $comment['author_id'] === null ? route('me') : route('user.show', $comment['author_id']) }}">
        <img class="feed-avatar comment-avatar" src="{{ asset('images/profile-avatar.svg') }}" width="36" height="36" alt="Foto profil {{ $comment['author_name'] }}" loading="lazy">
        <div><h3>{{ $comment['author_name'] }}</h3><p>{{ $comment['time'] }}</p></div></a>
    </header>
    <p class="comment-content">{{ $comment['content'] }}</p>
</article>

<article>
    <a href="{{ route('user.show', $post['author_id']) }}">
        <header>
            <img src="{{ asset('images/profile-avatar.svg') }}" alt="{{ $post['author_name'] }}" class="profile-avatar">
            <h3>{{ $post['author_name'] }}</h3>
            <div>
                {{ $post['author_username'] }} · {{ $post['time'] }}
            </div>
        </header>
    </a>
    <a href="{{ route('post.show', $post['id']) }}">
        <p>{{ $post['content'] }}</p>
    </a>
    <div>
        <a href="{{ route('post.show', $post['id']) }}#likes">{{ $post['likes'] }} likes</a>
        <a href="{{ route('post.show', $post['id']) }}#comments">{{ count($post['comments']) }} comments</a>
    </div>
</article>
<hr/>

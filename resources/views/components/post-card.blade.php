<article class="card mb-4">
    <div class="card-body">
        <a href="{{ route('user.show', $post['author_id']) }}" class="text-decoration-none text-body">
            <header class="d-flex gap-3">
                <div>
                    <img src="{{ asset('images/profile-avatar.svg') }}" alt="{{ $post['author_name'] }}" class="profile-avatar">
                </div>
                <div>
                    <h5 class="mb-0">{{ $post['author_name'] }}</h5>
                    <div class="text-muted">
                        {{ $post['author_username'] }} · {{ $post['time'] }}
                    </div>
                </div>
            </header>
        </a>
        <div class="mt-4">
            <a href="{{ route('post.show', $post['id']) }}" class="text-decoration-none text-body">
                <p>{{ $post['content'] }}</p>
            </a>
        </div>
        <div class="mt-3">
            <a href="{{ route('post.show', $post['id']) }}#likes">{{ $post['likes'] }} likes</a>
            <a href="{{ route('post.show', $post['id']) }}#comments">{{ count($post['comments']) }} comments</a>
        </div>
    </div>
</article>

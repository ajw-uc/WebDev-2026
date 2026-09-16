<div>
    <a href="{{ route('user.show', $comment['author_id']) }}" class="text-decoration-none text-body">
        <header class="d-flex gap-3 mb-3">
            <div>
                <img src="{{ asset('images/profile-avatar.svg') }}" alt="{{ $comment['author_name'] }}" class="profile-avatar-sm">
            </div>
            <div>
                <div class="mb-0 fw-semibold">
                    {{ $comment['author_name'] }}
                </div>
                <div class="text-muted">
                    {{ $comment['author_username'] }} · {{ $comment['time'] }}
                </div>
            </div>
        </header>
    </a>
    <p>{{ $comment['content'] }}</p>
</div>



<article class="network-person d-flex align-items-center justify-content-between gap-3 p-3">
    <a class="network-person-info d-flex align-items-center gap-3 text-reset text-decoration-none" href="{{ route('user.show', $person->id) }}">
        <img class="avatar rounded-circle border" src="{{ $person->image ? asset('storage/' . $person->image) : asset('images/profile-avatar.svg') }}" alt="{{ $person->name }}'s profile picture" loading="lazy">
        <span>
            <strong class="d-block">{{ $person->name }}</strong>
            <small class="text-body-secondary">{{ $person->username_display }}</small>
        </span>
    </a>
    @auth
        @if ($person->id !== auth()->id())
            @if ($followingIds->contains($person->id))
                <form action="{{ route('user.unfollow', $person->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-light btn-sm border rounded-pill px-3" type="submit"><i class="bi bi-person-check-fill me-1" aria-hidden="true"></i>Following</button>
                </form>
            @else
                <form action="{{ route('user.follow', $person->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-primary btn-sm rounded-pill px-3" type="submit"><i class="bi bi-person-plus me-1" aria-hidden="true"></i>Follow</button>
                </form>
            @endif
        @endif
    @endauth
</article>

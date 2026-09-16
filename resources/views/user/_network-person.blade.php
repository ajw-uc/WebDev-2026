<article class="network-person">
    <a class="network-person-info" href="{{ route('user.show', $person->id) }}">
        <img src="{{ $person->image ? asset('storage/'.$person->image) : asset('images/profile-avatar.svg') }}" width="52" height="52" alt="Foto profil {{ $person->name }}">
        <span><strong>{{ $person->name }}</strong><small>{{ $person->username_display }}</small></span>
    </a>
    @if($person->id !== auth()->id())
        @if($followingIds->contains($person->id))
            <form action="{{ route('user.unfollow', $person->id) }}" method="POST">@csrf
                @method('DELETE')
                <button class="btn btn-secondary" type="submit">Unfollow</button>
            </form>
        @else
            <form action="{{ route('user.follow', $person->id) }}" method="POST">@csrf<button class="btn btn-primary" type="submit">Follow</button></form>
        @endif
    @endif
</article>

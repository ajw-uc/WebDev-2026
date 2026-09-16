@extends('layout.default')

@section('title', 'Network')

@section('content')
    <div class="page-intro">
        <div>
            <div class="eyebrow">Followers & following</div>
            <h1>Your community</h1>
            <p>Find people to connect with and manage your network.</p>
        </div>
        <a href="{{ route('me') }}" class="btn btn-secondary">Back to profile</a>
    </div>

    <section class="card network-card" aria-labelledby="network-heading">
        <div class="card-body">
            <nav class="network-tabs" aria-label="Network lists">
                <a class="{{ $tab === 'followers' ? 'active' : '' }}" href="{{ route('user.network', ['tab' => 'followers', 'id' => $user->id]) }}">Followers <span>{{ $user->followers()->count() }}</span></a>
                <a class="{{ $tab === 'following' ? 'active' : '' }}" href="{{ route('user.network', ['tab' => 'following', 'id' => $user->id]) }}">Following <span>{{ $user->following()->count() }}</span></a>
            </nav>

            <div class="user-list mb-3">
                @forelse($people as $person)
                    @include('user._network-person', ['person' => $person, 'followingIds' => $followingIds])
                @empty
                    <div class="empty-state"><div class="empty-icon" aria-hidden="true">✧</div><h3>No {{ $tab }} yet.</h3><p class="text-muted">People you connect with will appear here.</p></div>
                @endforelse
            </div>
            {{ $people->links() }}
        </div>
    </section>
@endsection

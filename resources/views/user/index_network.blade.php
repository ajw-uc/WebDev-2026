@extends('layout.default')

@section('title', 'Network')

@section('content') 
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <a class="btn btn-light btn-sm rounded-pill mb-4" href="{{ route('me') }}">← Back to profile</a>

            <div>
                <span class="badge text-bg-primary rounded-pill mb-2">Followers &amp; following</span>
                <h1 class="display-6 fw-bold mb-1">Your community</h1>
                <p class="text-body-secondary mb-0">Find people to connect with and manage your network.</p>
            </div>

            <section class="card border-0 rounded-4 shadow-sm" aria-labelledby="network-heading">
                <div class="card-body p-4">
                    <h2 class="visually-hidden" id="network-heading">Your network</h2>
                    <nav class="network-tabs d-flex gap-2 p-1 mb-4 rounded-pill" aria-label="Network lists">
                        <a class="flex-fill rounded-pill text-center text-decoration-none {{ $tab === 'followers' ? 'active' : '' }}" href="{{ route('me.network', ['tab' => 'followers']) }}">Followers <span class="badge rounded-pill ms-1">{{ $user->followers()->count() }}</span></a>
                        <a class="flex-fill rounded-pill text-center text-decoration-none {{ $tab === 'following' ? 'active' : '' }}" href="{{ route('me.network', ['tab' => 'following']) }}">Following <span class="badge rounded-pill ms-1">{{ $user->following()->count() }}</span></a>
                    </nav>

                    <div class="user-list mb-3">
                        @forelse($people as $person)
                            @include('user._network-person', ['person' => $person, 'followingIds' => $followingIds])
                        @empty
                            <div class="text-center py-5"><span class="network-empty-icon d-inline-flex align-items-center justify-content-center rounded-circle mb-3" aria-hidden="true"><i class="bi bi-people"></i></span><h3 class="h5">No {{ $tab }} yet</h3><p class="text-body-secondary mb-0">People you connect with will appear here.</p></div>
                        @endforelse
                    </div>
                    {{ $people->links() }}
                </div>
            </section>
        </div>
    </div>
@endsection

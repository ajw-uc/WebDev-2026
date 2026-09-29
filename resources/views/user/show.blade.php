@extends('layout.default')

@section('title', $user->name)

@section('content')
    <section class="card border-0 shadow-sm rounded-4 overflow-hidden" aria-labelledby="profile-heading">
        <div class="profile-cover d-flex align-items-end justify-content-end p-4 text-white">
            <span class="h3 fw-bold mb-0 opacity-75">Meet the community.</span>
        </div>
        <div class="card-body px-4 px-md-5 pb-4">
            <div class="d-flex align-items-end justify-content-between gap-3">
                <img class="avatar avatar-lg profile-avatar rounded-circle bg-white" src="{{ $user->image ? asset('storage/' . $user->image) : asset('images/profile-avatar.svg') }}" alt="{{ $user->name }}'s profile picture">
                @auth
                    @if (! auth()->user()->is($user))
                        @if ($isFollowing)
                            <form class="mb-2" action="{{ route('user.unfollow', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-light border rounded-pill px-4" type="submit"><i class="bi bi-person-check-fill me-1" aria-hidden="true"></i>Following</button>
                            </form>
                        @else
                            <form class="mb-2" action="{{ route('user.follow', $user->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-primary rounded-pill px-4" type="submit"><i class="bi bi-person-plus me-1" aria-hidden="true"></i>Follow</button>
                            </form>
                        @endif
                    @endif
                @else
                    <a class="btn btn-primary rounded-pill px-4 mb-2" href="{{ route('login') }}"><i class="bi bi-person-plus me-1" aria-hidden="true"></i>Log in to follow</a>
                @endauth
            </div>
            <span class="badge text-bg-light rounded-pill d-table mt-3">Community profile</span>
            <h1 class="h2 fw-bold mt-2 mb-1" id="profile-heading">{{ $user->name }}</h1>
            <p class="text-body-secondary mb-3">{{ $user->username_display }}</p>
            <p class="mb-4">{{ $user->bio ?: 'No bio added yet.' }}</p>
            <div class="d-flex flex-wrap gap-4">
                <div>
                    <strong class="d-block fs-5">{{ $posts->total() }}</strong>
                    <span class="small text-body-secondary">Posts</span>
                </div>
                <a class="profile-stat text-reset text-decoration-none rounded-3" href="{{ route('user.network', ['id' => $user->id, 'tab' => 'followers']) }}">
                    <strong class="d-block fs-5">{{ $user->followers->count() }}</strong>
                    <span class="small text-body-secondary">Followers</span>
                </a>
                <a class="profile-stat text-reset text-decoration-none rounded-3" href="{{ route('user.network', ['id' => $user->id, 'tab' => 'following']) }}">
                    <strong class="d-block fs-5">{{ $user->following->count() }}</strong>
                    <span class="small text-body-secondary">Following</span>
                </a>
            </div>
        </div>
    </section>
    <section class="mt-5" aria-labelledby="my-posts-heading">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h2 class="h4 fw-bold mb-0" id="my-posts-heading">Posts</h2>
            <span class="badge text-bg-light rounded-pill">{{ $posts->total() }}</span>
        </div>
        @if ($posts->isEmpty())
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body text-center p-5">
                    <div class="display-5 text-primary mb-3">✎</div>
                    <h3 class="h5">No posts yet</h3>
                    <p class="text-body-secondary mb-0">This user hasn't shared a story yet.</p>
                </div>
            </div>
        @else
            <div class="d-grid gap-3">
                @foreach($posts as $post)
                    <x-post-card :post="$post"></x-post-card>
                @endforeach
            </div>
        @endif
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </section>
@endsection

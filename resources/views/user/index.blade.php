@extends('layout.default')

@section('title', 'My Profile')

@section('content')
    @if (session('status'))
        <div class="alert alert-success border-0 shadow-sm" role="status">
            <i class="bi bi-check-circle me-2" aria-hidden="true"></i>{{ session('status') }}
        </div>
    @endif
    <section class="card border-0 shadow-sm rounded-4 overflow-hidden" aria-labelledby="profile-heading">
        <div class="profile-cover d-flex align-items-end justify-content-end p-4 text-white">
            <span class="h3 fw-bold mb-0 opacity-75">A space for your story.</span>
        </div>
        <div class="card-body px-4 px-md-5 pb-4">
            <div class="d-flex align-items-end justify-content-between gap-3">
                <img class="avatar avatar-lg profile-avatar rounded-circle bg-white" src="{{ $user->image ? asset('storage/' . $user->image) : asset('images/profile-avatar.svg') }}" alt="{{ $user->name }}'s profile picture">
                <div class="dropdown mb-2">
                    <button class="btn btn-outline-primary rounded-pill px-4 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-gear me-1" aria-hidden="true"></i>
                        Profile settings
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow">
                        <li><a class="dropdown-item" href="{{ route('me.edit') }}"><i class="bi bi-person-gear me-2" aria-hidden="true"></i>Edit profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('password.edit') }}"><i class="bi bi-shield-lock me-2" aria-hidden="true"></i>Change password</a></li>
                        <li><a class="dropdown-item" href="{{ route('api-tokens.index') }}"><i class="bi bi-plug me-2" aria-hidden="true"></i>API tokens</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item text-danger" type="submit"><i class="bi bi-box-arrow-right me-2" aria-hidden="true"></i>Log out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <span class="badge text-bg-light rounded-pill mt-3">My profile</span>
            <h1 class="h2 fw-bold mt-2 mb-1" id="profile-heading">{{ $user->name }}</h1>
            <p class="text-body-secondary mb-3">{{ $user->username_display }}</p>
            <p class="mb-4">{{ $user->bio ?: 'No bio added yet.' }}</p>
            <div class="d-flex flex-wrap gap-4">
                <div>
                    <strong class="d-block fs-5">{{ $posts->total() }}</strong>
                    <span class="small text-body-secondary">Posts</span>
                </div>
                <a class="profile-stat text-reset text-decoration-none rounded-3" href="{{ route('me.network', ['tab' => 'followers']) }}">
                    <strong class="d-block fs-5">{{ $user->followers->count() }}</strong>
                    <span class="small text-body-secondary">Followers</span>
                </a>
                <a class="profile-stat text-reset text-decoration-none rounded-3" href="{{ route('me.network', ['tab' => 'following']) }}">
                    <strong class="d-block fs-5">{{ $user->following->count() }}</strong>
                    <span class="small text-body-secondary">Following</span>
                </a>
            </div>
        </div>
    </section>

    <section class="mt-5" aria-labelledby="my-posts-heading">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h2 class="h4 fw-bold mb-0" id="my-posts-heading">My posts</h2>
            @if(!$posts->isEmpty()) 
                <a href="{{ route('post.create') }}" class="btn btn-primary rounded-pill px-4">Create new post ↗</a>
            @endif
        </div>
        @if ($posts->isEmpty())
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body text-center p-5">
                    <div class="display-5 text-primary mb-3">✎</div>
                    <h3 class="h5">Your story starts here</h3>
                    <p class="text-body-secondary">No posts yet. The moments you share will appear here.</p>
                    <a href="{{ route('post.create') }}" class="btn btn-primary rounded-pill px-4">Create your first post ↗</a>
                </div>
            </div>
        @else
            <div class="d-grid gap-3">
                @foreach($posts as $post)
                    <x-post.card :post="$post" />
                @endforeach
            </div>
        @endif
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </section>
@endsection

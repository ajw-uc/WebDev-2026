@extends('layout.default')

@section('title', 'My Profile')

@section('content')
    <section class="card border-0 shadow-sm rounded-4 overflow-hidden" aria-labelledby="profile-heading">
        <div class="profile-cover d-flex align-items-end justify-content-end p-4 text-white"><span class="h3 fw-bold mb-0 opacity-75">A space for your story.</span></div>
        <div class="card-body px-4 px-md-5 pb-4">
            <div class="d-flex align-items-end justify-content-between"><img class="avatar avatar-lg profile-avatar rounded-circle bg-white" src="{{ asset('images/profile-avatar.svg') }}" alt="My profile picture"><a class="btn btn-outline-primary rounded-pill px-4 mb-2" href="{{ route('me.edit') }}">Edit profile</a></div>
            <span class="badge text-bg-light rounded-pill mt-3">My profile</span>
            <h1 class="h2 fw-bold mt-2 mb-1" id="profile-heading">{{ $user['name'] }}</h1><p class="text-body-secondary mb-3">{{ $user['username'] }}</p>
            <p class="mb-4">{{ $user['caption'] }}</p>
            <div class="d-flex flex-wrap gap-4"><div><strong class="d-block fs-5">{{ count($posts) }}</strong><span class="small text-body-secondary">Posts</span></div><div><strong class="d-block fs-5">{{ $user['followers'] }}</strong><span class="small text-body-secondary">Followers</span></div><div><strong class="d-block fs-5">{{ $user['following'] }}</strong><span class="small text-body-secondary">Following</span></div></div>
        </div>
    </section>

    <section class="mt-5" aria-labelledby="my-posts-heading">
        <div class="d-flex align-items-center justify-content-between mb-3"><h2 class="h4 fw-bold mb-0" id="my-posts-heading">My posts</h2><span class="badge text-bg-light rounded-pill">{{ count($posts) }}</span></div>
            @empty($posts)
                <div class="card border-0 shadow-sm rounded-4"><div class="card-body text-center p-5"><div class="display-5 text-primary mb-3">✎</div><h3 class="h5">Your story starts here</h3><p class="text-body-secondary">No posts yet. The moments you share will appear here.</p><a href="{{ route('post.create') }}" class="btn btn-primary rounded-pill px-4">Create your first post ↗</a></div></div>
            @else
                <div class="d-grid gap-3">
                    @foreach($posts as $post)
                        <x-post-card :post="$post" />
                    @endforeach
                </div>
            @endif
    </section>
@endsection

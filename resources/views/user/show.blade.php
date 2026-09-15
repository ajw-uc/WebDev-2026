@extends('layout.default')

@section('title', $user['name'])

@section('content')
    <div class="eyebrow">Meet the community</div>
    <section class="card profile-card" aria-labelledby="profile-heading">
        <div class="profile-cover" aria-hidden="true"><span>Make room for your story.</span></div>
        <div class="card-body profile-details">
            <img class="profile-picture public-profile-avatar"  src="{{ $user->image ? asset('storage/'.$user->image) : asset('images/profile-avatar.svg') }}" width="104" height="104" alt="Foto profil {{ $user['name'] }}">
            <span class="profile-label">Community profile</span>
            <h1 id="profile-heading">{{ $user->name }}</h1><p class="text-muted mb-2">{{ $user->username_display }}</p>
            <p class="profile-bio">{{ $user->bio }}</p>
            <div class="d-sm-flex gap-3">
                <div class="profile-count"><strong>{{ count($posts) }}</strong> posts</div>
                <div class="profile-count"><strong>{{ $user->followers->count() }}</strong> followers</div>
                <div class="profile-count"><strong>{{ $user->following->count() }}</strong> following</div>
            </div>
        </div>
    </section>

    <section class="card mt-4" aria-labelledby="my-posts-heading">
        <div class="card-header profile-posts-header">
            <h2 id="my-posts-heading">Posts <span>{{ count($posts) }}</span></h2>
            <span>Stories and moments</span>
        </div>
        <div class="card-body">
            @empty($posts)
                <div class="empty-state">
                    <div class="empty-icon" aria-hidden="true">✎</div>
                    <h3>No posts yet.</h3>
                    <p class="text-muted">This user hasn’t shared any posts yet.</p>
                </div>
            @else
                <div class="feed">
                    @foreach($posts as $post)
                        <x-post-card :post="$post"></x-post-card>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection

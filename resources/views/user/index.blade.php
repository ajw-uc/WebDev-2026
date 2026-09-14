@extends('layout.default')

@section('title', 'My Profile')

@section('content')
    <div class="eyebrow">Your little corner</div>
    <section class="card profile-card" aria-labelledby="profile-heading">
        <div class="profile-cover" aria-hidden="true"><span>Make room for your story.</span></div>
        <div class="card-body profile-details">
            <img class="profile-picture" src="{{ asset('images/profile-avatar.svg') }}" width="104" height="104" alt="My profile picture">
            <span class="profile-label">My profile</span>
            <h1 id="profile-heading"><?= $user['name'] ?></h1><p class="text-muted mb-2">{{ $user['username'] }}</p>
            <p class="profile-bio"><?= $user['caption'] ?></p>
            <div class="d-sm-flex gap-3">
                <div class="profile-count"><strong><?= count($posts) ?></strong> posts</div>
                <div class="profile-count"><strong><?= $user['followers'] ?></strong> followers</div>
                <div class="profile-count"><strong><?= $user['following'] ?></strong> following</div>
            </div>
        </div>
    </section>

    <section class="card mt-4" aria-labelledby="my-posts-heading">
        <div class="card-header profile-posts-header"><h2 id="my-posts-heading">My Posts <span>0</span></h2><span>Your stories, all together</span></div>
        <div class="card-body">
            @empty($posts)
                <div class="empty-state">
                    <div class="empty-icon" aria-hidden="true">✎</div>
                    <h3>Your story starts here.</h3>
                    <p class="text-muted">You haven’t posted anything yet. The moments you share will have a home right here.</p>
                    <a href="{{ route('post.create') }}" class="btn btn-primary">Create your first post ↗</a>
                </div>
            @else
                <div class="feed-feed">
                    @foreach($posts as $post)
                        <x-post-card :post="$post" />
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection

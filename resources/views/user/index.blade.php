@extends('layout.default')

@section('title', 'My Profile')

@section('content')
    <div class="eyebrow">Your little corner</div>
    <section class="card profile-card" aria-labelledby="profile-heading">
        <div class="profile-cover" aria-hidden="true"><span>Make room for your story.</span></div>
        <div class="card-body profile-details">
            <img class="profile-picture public-profile-avatar" src="{{ $user->image ? asset('storage/'.$user->image) : asset('images/profile-avatar.svg') }}" width="104" height="104" alt="Foto profil {{ $user['name'] }}">
            <div class="dropdown profile-settings">
                <button class="profile-settings-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{ route('me.edit') }}">Edit profile</a>
                    <a class="dropdown-item" href="{{ route('password.edit') }}">Change password</a>
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="dropdown-item" type="submit">Log out</button>
                    </form>
                </div>
            </div>
            <h1 id="profile-heading">{{ $user->name }}</h1><p class="text-muted mb-2">{{ $user->username_display }}</p>
            <p class="profile-bio">{{ $user->bio }}</p>
            <div class="d-sm-flex gap-3">
                <div class="profile-count"><strong>{{ $posts->total() }}</strong> posts</div>
                <div class="profile-count"><strong>{{ $user->followers->count() }}</strong> followers</div>
                <div class="profile-count"><strong>{{ $user->following->count() }}</strong> following</div>
            </div>
        </div>
    </section>

    <section class="card mt-4" aria-labelledby="my-posts-heading">
        <div class="card-header profile-posts-header">
            <h2 id="my-posts-heading">My Posts <span>{{ $posts->total() }}</span></h2>
            <span>Your stories, all together</span>
        </div>
        <div class="card-body">
            @if($posts->total() === 0)
                <div class="empty-state">
                    <div class="empty-icon" aria-hidden="true">✎</div>
                    <h3>Your story starts here.</h3>
                    <p class="text-muted">You haven’t posted anything yet. The moments you share will have a home right here.</p>
                    <a href="{{ route('post.create') }}" class="btn btn-primary">Create your first post ↗</a>
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

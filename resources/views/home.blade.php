@extends('layout.default')

@section('title', 'Home')

@section('content')
    <div class="mb-4">
        <span class="badge text-bg-primary rounded-pill mb-2">Your everyday community</span>
        <h1 class="display-6 fw-bold">A little thought. A new connection.</h1>
        <p class="text-body-secondary mb-0">Share your moments, spark a conversation, and make yourself at home.</p>
    </div>
    <section class="card border-0 shadow-sm rounded-4 mb-4" id="buat-post"><div class="card-body p-4">
        <div class="d-flex align-items-center gap-3 mb-3">
            <img class="avatar rounded-circle border" src="{{ asset('images/profile-avatar.svg') }}" alt="My profile picture">
            <div>
                <h2 class="h5 mb-0">Create a post</h2>
                <p class="small text-body-secondary mb-0">What's on your mind?</p>
            </div>
        </div>
        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">@csrf
            <x-form.group>
                <x-form.textarea aria-label="Post content" name="content" rows="4" placeholder="Write your story..." />
            </x-form.group>
            <x-form.group>
                <x-form.input type="file" class="form-control form-control-sm" aria-label="Post image" name="image" accept="image/*" />
            </x-form.group>
            <div class="d-flex justify-content-between align-items-center gap-3">
                <div>
                    <span>Big ideas start with a little thought.</span>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">Share post ↗</button>
                </div>
            </div>
        </form>
    </div></section>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h2 class="h4 fw-bold mb-1">Latest posts</h2>
            <p class="small text-body-secondary mb-0">Fresh stories from the community</p>
        </div>
        <span class="badge text-bg-light rounded-pill">{{ count($posts) }} posts</span>
    </div>
    <div class="d-grid gap-3">
        @foreach($posts as $post)
            <x-post-card :post="$post"></x-post-card>
        @endforeach
    </div>

    <div class="mt-3">
        {{ $posts->links()}}
    </div>
@endsection

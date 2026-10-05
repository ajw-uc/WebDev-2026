@extends('layout.default')

@section('title', 'Home')

@section('content')
    <div class="mb-4">
        <span class="badge text-bg-primary rounded-pill mb-2">Your everyday community</span>
        <h1 class="display-6 fw-bold">A little thought. A new connection.</h1>
        <p class="text-body-secondary mb-0">Share your moments, spark a conversation, and make yourself at home.</p>
    </div>
    <section class="card border-0 shadow-sm rounded-4 mb-4" id="buat-post"><div class="card-body p-4">
        @auth
            <div class="d-flex align-items-center gap-3 mb-3">
                <img class="avatar rounded-circle border" src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('images/profile-avatar.svg') }}" alt="My profile picture">
                <div>
                    <h2 class="h5 mb-0">Create a post</h2>
                    <p class="small text-body-secondary mb-0">What's on your mind?</p>
                </div>
            </div>
            <x-post.form hide-label="true">
                <x-slot:actions>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                        <div>
                            <span>Big ideas start with a little thought.</span>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary rounded-pill px-4">Share post ↗</button>
                        </div>
                    </div>
                </x-slot:actions>
            </x-post.form>
        @else
            <div class="guest-prompt d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-4 p-2">
                <div class="d-flex align-items-center gap-3">
                    <span class="guest-prompt-icon d-inline-flex align-items-center justify-content-center rounded-circle" aria-hidden="true">
                        <i class="bi bi-pencil-square"></i>
                    </span>
                    <div>
                        <h2 class="h5 fw-bold mb-1">Share your own story</h2>
                        <p class="text-body-secondary mb-0">Log in or create an account to publish a post.</p>
                    </div>
                </div>
                <div class="d-flex gap-2 flex-shrink-0">
                    <a class="btn btn-light border rounded-pill px-4" href="{{ route('login') }}">Log in</a>
                    <a class="btn btn-primary rounded-pill px-4" href="{{ route('signup') }}">Sign up</a>
                </div>
            </div>
        @endauth
    </section>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h2 class="h4 fw-bold mb-1">Latest posts</h2>
            <p class="small text-body-secondary mb-0">Fresh stories from the community</p>
        </div>
        <span class="badge text-bg-light rounded-pill">{{ count($posts) }} posts</span>
    </div>
    <div class="d-grid gap-3">
        @foreach($posts as $post)
            <x-post.card :post="$post"></x-post.card>
        @endforeach
    </div>

    <div class="mt-3">
        {{ $posts->links()}}
    </div>
@endsection

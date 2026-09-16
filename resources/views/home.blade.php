@extends('layout.default')

@section('title', 'Home')

@section('content')
    <header class="page-intro"><div><div class="eyebrow">Your everyday community</div><h1>A little thought. A new connection.</h1><p>Share your moments, spark a conversation, and make yourself at home.</p></div><span class="intro-label">A space to connect</span></header>
    @auth
    <div class="card mb-4">
        <div class="card-header bg-white">
            <h5 class="mb-0">Share something</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-form.group>
                    <x-form.textarea id="content" name="content" rows="5" placeholder="What's on your mind?" />
                </x-form.group>
                <x-form.group>
                    <x-form.input type="file" class="form-control" aria-label="Post image" name="image" accept="image/jpeg,image/png,image/webp" />
                    <small class="form-text text-muted">JPG, PNG, atau WebP. max 2 MB.</small>
                </x-form.group>

                <div class="composer-footer"><span>Big ideas start with a little thought.</span><button type="submit" class="btn btn-primary">Share post <span aria-hidden="true" style="color:inherit">↗</span></button></div>
            </form>
        </div>
    </div>
    @else
    <div class="card mb-4 text-center guest-placeholder">
        <div class="card-header bg-white">
            <span class="eyebrow">Welcome to Mini Social</span>
        </div>
        <div class="card-body pt-5">
            <h4>Join the conversation</h4>
            <p class="text-muted guest-placeholder-copy">Login to share your thoughts, connect with people, and join the community.</p>
            <div class="guest-placeholder-actions">
                <a href="{{ route('login') }}" class="btn btn-primary">Log in <span aria-hidden="true">↗</span></a>
                <a href="{{ route('signup') }}" class="btn btn-secondary">Create account</a>
            </div>
        </div>
    </div>
    @endauth

    <div class="card mb-4">
        <div class="card-header bg-white">
            <h5 class="mb-0">Recent Posts</h5>
        </div>
        <div class="card-body">
            <div class="feed">
                <?php foreach($posts as $post): ?>
                    <x-post-card :post="$post"></x-post-card>
                <?php endforeach; ?>
            </div>
            <div class="mt-3">
                {{ $posts->links()}}
            </div>
        </div>
    </div>
@endsection

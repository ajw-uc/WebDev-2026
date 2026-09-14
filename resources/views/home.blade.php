@extends('layout.default')

@section('title', 'Home')

@section('content')
    <header class="page-intro"><div><div class="eyebrow">Your everyday community</div><h1>A little thought. A new connection.</h1><p>Share your moments, spark a conversation, and make yourself at home.</p></div><span class="intro-label">A space to connect</span></header>
    <div class="card mb-4">
        <div class="card-header bg-white">
            <h5 class="mb-0">Share something</h5>
        </div>
        <div class="card-body">
            <form action="/post" method="POST">
                <x-form.group>
                    <textarea class="form-control" aria-label="Post content" name="content" rows="3" placeholder="What's on your mind?"></textarea>
                </x-form.group>
                <x-form.group>
                    <input type="file" class="form-control" aria-label="Post image" name="image" placeholder="Upload an image (optional)">
                </x-form.group>
                <div class="composer-footer"><span>Big ideas start with a little thought.</span><button type="submit" class="btn btn-primary">Share post <span aria-hidden="true" style="color:inherit">↗</span></button></div>
            </form>
        </div>
    </div>

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
        </div>
    </div>
@endsection

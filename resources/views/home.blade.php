@extends('layout.default')

@section('title', 'Home')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <h3 class="mb-3">Share something!</h3>
            <form action="{{ route('post.store') }}" method="POST">
                <x-form.group>
                    <textarea class="form-control" aria-label="Post content" name="content" rows="3" placeholder="What's on your mind?"></textarea>
                </x-form.group>
                <x-form.group>
                    <input type="file" class="form-control" aria-label="Post image" name="image" placeholder="Upload an image (optional)">
                </x-form.group>
                <button type="submit" class="btn btn-primary">Share post</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Recent Posts</h5>
        </div>
        <div class="card-body">
            @foreach ($posts as $post)
                <x-post-card :post="$post"></x-post-card>
            @endforeach
        </div>
    </div>
@endsection

@extends('layout.default')

@section('title', 'Create Post')

@section('content')

    <div class="container mt-4">
        <header class="page-intro"><div><div class="eyebrow">Make a little connection</div><h1>Your thoughts belong here.</h1><p>Share an idea, a moment, or something that made you smile.</p></div></header>
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Create New Post</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('post.store') }}" method="POST">
                        <x-form.group>
                            <label for="content" class="form-label">Post Content</label>
                            <textarea class="form-control" id="content" name="content" rows="5" placeholder="What's on your mind?"></textarea>
                        </x-form.group>
                        <x-form.group>
                            <input type="file" class="form-control" aria-label="Post image" name="image" placeholder="Upload an image (optional)">
                        </x-form.group>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Publish Post</button>
                            <a href="{{ route('me') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

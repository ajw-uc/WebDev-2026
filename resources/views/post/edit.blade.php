@extends('layout.default')

@section('title', 'Edit Post')

@section('content')
    <a class="btn btn-light btn-sm rounded-pill mb-4" href="{{ route('post.show', ['id' => $post->id]) }}">
        <i class="bi bi-arrow-left me-1" aria-hidden="true"></i>Back to post
    </a>
    <div class="mb-4">
        <span class="badge text-bg-primary rounded-pill mb-2">Shape your story</span>
        <h1 class="display-6 fw-bold">Edit your post</h1>
        <p class="text-body-secondary mb-0">Update your thought and keep the conversation going.</p>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('post.update', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @include('post._form', ['post' => $post])
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="{{ route('post.show', ['id' => $post->id]) }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layout.default')

@section('title', 'Edit Post')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <a class="btn btn-light btn-sm rounded-pill mb-4" href="{{ route('post.show', ['id' => $post->id]) }}">← Back to post</a>
            <div class="mb-4">
                <span class="badge text-bg-primary rounded-pill mb-2">Shape your story</span>
                <h1 class="display-6 fw-bold">Edit your post.</h1>
                <p class="text-body-secondary mb-0">Update your thought and keep the conversation going.</p>
            </div>
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-md-5">
                    <x-post.form :post="$post" method="patch" />
                </div>
            </div>
        </div>
    </div>
@endsection

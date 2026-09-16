@extends('layout.default')

@section('title', 'Edit Post')

@section('content')
    <a class="detail-back" href="{{ route('post.show', ['id' => $post->id]) }}">← Back to post</a>
    <header class="page-intro">
        <div><div class="eyebrow">Shape your story</div><h1>Edit your post.</h1><p>Update your thought and keep the conversation going.</p></div>
    </header>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('post.update', ['id' => $post->id]) }}" method="POST">
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

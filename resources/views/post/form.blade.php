@extends('layout.default')

@section('title', 'Create Post')

@section('content')
    <form action="{{ route('post.store') }}" method="POST">
        <div>
            <textarea name="content" placeholder="What's on your mind?" rows="5"></textarea>
        </div>
        <div>
            <input type="file" name="image">
        </div>
        <div>
            <button type="submit">Post</button>
        </div>
    </form>
@endsection

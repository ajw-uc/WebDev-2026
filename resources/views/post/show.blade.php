@extends('layout.default')

@section('title', $post['author_name'] . "'s post")

@section('content')
    <h1 class="mb-3">{{ $post['author_name'] }}'s post</h1>
    <x-post-card :post="$post"></x-post-card>
    <h4>Comments</h4>
    <div class="list-group">
        @foreach ($post['comments'] as $comment)
            <div class="list-group-item pt-4">
                <x-post-comment :comment="$comment"></x-post-comment>
            </div>
        @endforeach
    </div>
@endsection

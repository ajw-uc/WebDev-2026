@extends('layout.default')

@section('title', $post['author_name'] . "'s post")

@section('content')
    <h1>Post detail</h1>
    <x-post-card :post="$post"></x-post-card>
    <hr/>
    <h4>Comments</h4>
    <div>
        @foreach ($post['comments'] as $comment)
            <div>
                <h5>{{ $comment['author_name'] }}</h5>
                <p>{{ $comment['content'] }}</p>
            </div>
        @endforeach
    </div>
@endsection

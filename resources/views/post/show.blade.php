@extends('layout.default')

@section('title', $post['author']."'s post")

@section('content')
    <h1>Post detail</h1>
    <p>Content: {{ $post['content'] }}</p>
@endsection

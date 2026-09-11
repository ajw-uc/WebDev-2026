@extends('layout.default')

@section('title', 'Home')

@section('content')
    @foreach ($posts as $post)
        <x-post-card :post="$post"></x-post-card>
    @endforeach
@endsection

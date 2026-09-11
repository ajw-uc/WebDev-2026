@extends('layout.default')

@section('title', $user['name'])

@section('content')
    <h1>Profile</h1>
    <p>Nama: {{ $user['name'] }}</p>
    <p>Username: {{ $user['username'] }}</p>
    <p>Caption: {{ $user['caption'] }}</p>
    <p>Posts:</p>
    @foreach ($posts as $post)
        <x-post-card :post="$post"></x-post-card>
    @endforeach
@endsection

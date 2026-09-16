@extends('layout.default')

@section('title', 'My Profile')

@section('content')
    <h1>Profile</h1>
    <p>Nama: {{ $user['name'] }}</p>
    <p>Username: {{ $user['username'] }}</p>
    <p>Caption: {{ $user['caption'] }}</p>
    <a href="{{ route('me.edit') }}" class="btn btn-primary">Edit Profile</a>
    <a href="{{ route('post.create') }}" class="btn btn-success">Create Post</a>
@endsection

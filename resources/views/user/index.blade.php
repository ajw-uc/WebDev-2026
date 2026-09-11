@extends('layout.default')

@section('title', 'My Profile')

@section('content')
    <h1>Profile</h1>
    <p>Nama: {{ $user['name'] }}</p>
    <p>Username: {{ $user['username'] }}</p>
    <p>Caption: {{ $user['caption'] }}</p>
@endsection

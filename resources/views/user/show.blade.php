@extends('layout.default')

@section('title', $user['name'])

@section('content')
    <h1>Profile</h1>
    <p>Nama: {{ $user['name'] }}</p>
    <p>Username: {{ $user['username'] }}</p>
@endsection

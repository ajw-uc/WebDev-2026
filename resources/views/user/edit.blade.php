@extends('layout.default')

@section('title', 'My Profile')

@section('content')
    <form action="{{ route('me.update') }}" method="post">
        <x-form.group>
            <label for="image">Image</label>
            <div>
                <img src="{{ asset('images/profile-avatar.svg') }}" alt="Profile Avatar" class="profile-avatar-lg">
            </div>
            <input type="file" name="image" id="image" class="form-control">
        </x-form.group>
        <x-form.group>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </x-form.group>
        <x-form.group>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control">
        </x-form.group>
        <x-form.group>
            <label for="caption">Caption</label>
            <input type="text" name="caption" id="caption" class="form-control">
        </x-form.group>
        <button type="submit" class="btn btn-primary">Save Profile</button>
    </form>
@endsection

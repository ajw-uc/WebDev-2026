@extends('layout.default')

@section('title', 'My Profile')

@section('content')
    <div class="auth-shell profile-edit-shell">
        <div class="auth-card">
            <div class="eyebrow">Personal details</div>
            <h1>Edit your profile.</h1>
            <p class="text-muted">Keep your profile fresh and unmistakably you.</p>
            <form action="{{ route('me.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-form.group>
                    <div>
                        <img src="{{ $user->image ? asset('storage/'.$user->image) : asset('images/profile-avatar.svg') }}" alt="Profile Avatar" class="profile-avatar-lg">
                    </div>
                    <x-form.input type="file" name="image" label="Image"></x-form.input>
                </x-form.group>
                <x-form.group>
                    <x-form.input type="text" name="name" label="Name" value="{{ $user->name }}"></x-form.input>
                </x-form.group>
                <x-form.group>
                    <x-form.input type="text" name="email" label="Email" value="{{ $user->email }}"></x-form.input>
                </x-form.group>
                <x-form.group>
                    <x-form.input type="text" name="username" label="Username" value="{{ $user->username }}"></x-form.input>
                </x-form.group>
                <x-form.group>
                    <x-form.textarea name="bio" label="Bio" value="{{ $user->bio }}"></x-form.textarea>
                </x-form.group>
                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">Save profile</button>
                    <a href="{{ route('me') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection

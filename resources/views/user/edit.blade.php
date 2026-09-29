@extends('layout.default')

@section('title', 'My Profile')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <a class="btn btn-light btn-sm rounded-pill mb-4" href="{{ route('me') }}">← Back to profile</a>
            <div class="mb-4">
                <span class="badge text-bg-primary rounded-pill mb-2">Profile settings</span>
                <h1 class="display-6 fw-bold">Update your profile</h1>
                <p class="text-body-secondary mb-0">Make your profile feel more personal and easy to recognize.</p>
            </div>
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-md-5">
                    <form class="profile-form" action="{{ route('me.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <x-form.group class="text-center pb-3">
                            <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('images/profile-avatar.svg') }}" alt="{{ $user->name }}'s profile picture" class="avatar avatar-lg rounded-circle border mb-3">
                            <label class="form-label fw-semibold d-block" for="image">Profile picture</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/jpeg,image/png,image/webp">
                            <div class="form-text">JPG, PNG, or WebP. Maximum file size is 2 MB.</div>
                            @error('image')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </x-form.group>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" placeholder="Full name" required>
                                @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $user->username) }}" placeholder="username" required>
                                @error('username')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <x-form.group>
                            <label class="form-label fw-semibold" for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" placeholder="you@example.com" required>
                            @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </x-form.group>
                        <x-form.group>
                            <label class="form-label fw-semibold" for="bio">Short bio</label>
                            <textarea name="bio" id="bio" class="form-control" rows="4" maxlength="255" placeholder="Tell us a little about yourself...">{{ old('bio', $user->bio) }}</textarea>
                            @error('bio')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </x-form.group>
                        <div class="d-flex flex-column-reverse flex-sm-row justify-content-end gap-2 pt-4 border-top">
                            <a href="{{ route('me') }}" class="btn btn-light border rounded-pill px-4">Cancel</a>
                            <button type="submit" class="btn btn-primary rounded-pill px-4"><i class="bi bi-check2-circle me-1" aria-hidden="true"></i>Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

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
                    <form action="{{ route('me.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <x-form.group class="text-center">
                            <img src="{{ asset('images/profile-avatar.svg') }}" alt="Profile picture" class="avatar avatar-lg rounded-circle border mb-3">
                            <x-form.label for="image" class="d-block">Profile picture</x-form.label>
                            <x-form.input type="file" name="image" id="image" class="form-control" accept="image/*" />
                        </x-form.group>
                        <div class="row">
                            <div class="col-md-6">
                                <x-form.group>
                                    <x-form.input type="text" name="name" id="name" label="Name" class="form-control" placeholder="Full name" />
                                </x-form.group>
                            </div>
                            <div class="col-md-6">
                                <x-form.group>
                                    <x-form.input type="text" name="username" id="username" label="Username" class="form-control" placeholder="@username" />
                                </x-form.group>
                            </div>
                        </div>
                        <x-form.group>
                            <x-form.textarea name="caption" id="caption" class="form-control" rows="4" placeholder="Tell us a little about yourself..." label="Short bio" />
                        </x-form.group>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('me') }}" class="btn btn-light rounded-pill px-4">Cancel</a>
                            <button type="submit" class="btn btn-primary rounded-pill px-4">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

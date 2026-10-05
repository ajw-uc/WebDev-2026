@extends('layout.default')

@section('title', 'Create Post')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <a class="btn btn-light btn-sm rounded-pill mb-4" href="{{ route('me') }}">← Back to profile</a>
            <div class="mb-4">
                <span class="badge text-bg-primary rounded-pill mb-2">New post</span>
                <h1 class="display-6 fw-bold">Your story is worth sharing.</h1>
                <p class="text-body-secondary mb-0">Share an idea, a moment, or something that made you smile.</p>
            </div>
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-md-5">
                    <x-post.form />
                </div>
            </div>
        </div>
    </div>
@endsection

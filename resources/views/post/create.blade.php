@extends('layout.default')

@section('title', 'Create Post')

@section('content')
    <a class="btn btn-light btn-sm rounded-pill mb-4" href="{{ route('me') }}">
        <i class="bi bi-arrow-left me-1" aria-hidden="true"></i>Back to profile
    </a>
    <div class="mb-4">
        <span class="badge text-bg-primary rounded-pill mb-2">Make a little connection</span>
        <h1 class="display-6 fw-bold">Create new post</h1>
        <p class="text-body-secondary mb-0">Share an idea, a moment, or something that made you smile.</p>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @include('post._form')

                <div class="d-flex flex-column-reverse flex-sm-row align-items-stretch align-items-sm-center justify-content-end gap-2">
                    <a href="{{ route('me') }}" class="btn btn-light border rounded-pill px-4">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">
                        <i class="bi bi-send me-1" aria-hidden="true"></i>
                        Publish post
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layout.default')

@section('title', 'Create Post')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <a class="btn btn-light btn-sm rounded-pill mb-4" href="{{ route('home') }}">← Back</a>
            <div class="mb-4">
                <span class="badge text-bg-primary rounded-pill mb-2">New post</span>
                <h1 class="display-6 fw-bold">Your story is worth sharing.</h1>
                <p class="text-body-secondary mb-0">Share an idea, a moment, or something that made you smile.</p>
            </div>
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">@csrf
                        <x-form.group>
                            <label for="content" class="form-label fw-semibold">Post content</label>
                            <textarea class="form-control bg-body-tertiary border-0" id="content" name="content" rows="7" placeholder="What's on your mind?"></textarea>
                        </x-form.group>
                        <x-form.group>
                            <label for="image" class="form-label fw-semibold">Image <span class="text-body-secondary fw-normal">(optional)</span></label>
                            <input type="file" id="image" class="form-control" name="image" accept="image/*">
                        </x-form.group>
                        <div class="d-flex gap-2 justify-content-end"><a href="{{ route('me') }}" class="btn btn-light rounded-pill px-4">Cancel</a>
                        <button type="submit" class="btn btn-primary rounded-pill px-4">Publish ↗</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

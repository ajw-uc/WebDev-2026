@extends('layout.default')

@section('title', $post['author_name'] . "'s post")

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <a class="btn btn-light btn-sm rounded-pill mb-4" href="{{ route('home') }}">← Back to home</a>
            <div class="mb-4">
                <span class="badge text-bg-primary rounded-pill mb-2">Conversation</span>
                <h1 class="h2 fw-bold mb-0">{{ $post['author_name'] }}'s post</h1>
            </div>
            <x-post-card :post="$post"></x-post-card>
            <section class="card border-0 shadow-sm rounded-4 mt-4" id="comments" aria-labelledby="comments-heading">
                <div class="card-header bg-white border-0 px-4 pt-4 pb-0 d-flex align-items-center justify-content-between">
                    <h2 class="h5 fw-bold mb-0" id="comments-heading">Comments</h2>
                    <span class="badge text-bg-light rounded-pill">{{ count($post['comments']) }}</span>
                </div>
                <div class="card-body p-4">
                    <form class="pb-4 mb-2 border-bottom" action="{{ route('post.comments.store', $post['id']) }}" method="POST">
                        @csrf
                        <label class="form-label fw-semibold" for="comment-content">Write a comment</label>
                        <textarea class="form-control bg-body-tertiary border-0" id="comment-content" name="content" rows="3" maxlength="1000" required placeholder="Share your thoughts..." aria-describedby="comment-help @error('content') comment-error @enderror" @error('content') aria-invalid="true" @enderror>{{ old('content') }}</textarea>
                        @error('content')
                            <p id="comment-error" class="text-danger small mt-2" role="alert">{{ $message }}</p>
                        @enderror
                        <div class="d-flex align-items-center justify-content-between gap-3 mt-3">
                            <span class="small text-body-secondary" id="comment-help">Maximum 1,000 characters</span>
                            <button class="btn btn-primary rounded-pill px-4" type="submit">Send ↗</button>
                        </div>
                    </form>
                    @if (session('comment_status'))
                        <div class="alert alert-success" role="status">{{ session('comment_status') }}</div>
                    @endif
                    @forelse ($post['comments'] as $comment)
                        <x-post-comment :comment="$comment"></x-post-comment>
                    @empty
                        <div class="text-center py-5">
                            <div class="fs-1 text-primary mb-2">◇</div>
                            <h3 class="h5">No comments yet</h3>
                            <p class="text-body-secondary small mb-0">Be the first to start the conversation.</p>
                        </div>
                    @endforelse
                </div>
            </section>
        </div>
    </div>
@endsection

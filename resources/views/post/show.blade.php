@extends('layout.default')

@section('title', $post->user->name . "'s post")

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <a class="btn btn-light btn-sm rounded-pill mb-4" href="{{ route('home') }}">← Back to home</a>
            <div class="post-detail-header mb-4 d-flex flex-column flex-sm-row align-items-sm-end justify-content-between gap-3">
                <div>
                    <span class="badge text-bg-primary rounded-pill mb-2">Conversation</span>
                    <h1 class="h2 fw-bold mb-0">{{ $post->user->name }}'s post</h1>
                </div>
                @auth
                    <div class="post-actions d-flex align-items-center gap-2" aria-label="Post actions">
                        <a class="btn btn-light border rounded-pill px-3" href="{{ route('post.edit', ['id' => $post->id]) }}">
                            <i class="bi bi-pencil-square me-1" aria-hidden="true"></i>
                            Edit post
                        </a>
                        <button class="btn btn-outline-danger rounded-pill px-3" type="button" data-bs-toggle="modal" data-bs-target="#deletePostModal">
                            <i class="bi bi-trash3 me-1" aria-hidden="true"></i>
                            Delete
                        </button>
                    </div>
                @endauth
            </div>
            <x-post-card :post="$post"></x-post-card>
            <section class="card border-0 shadow-sm rounded-4 mt-4" id="comments" aria-labelledby="comments-heading">
                <div class="card-header bg-white border-0 px-4 pt-4 pb-0 d-flex align-items-center justify-content-between">
                    <h2 class="h5 fw-bold mb-0" id="comments-heading">Comments</h2>
                    <span class="badge text-bg-light rounded-pill">{{ $post->comments->count() }}</span>
                </div>
                <div class="card-body p-4">
                    @auth
                        <form class="pb-4 mb-2 border-bottom" action="{{ route('post.comments.store', $post->id) }}" method="POST">
                            @csrf
                            <label class="form-label fw-semibold" for="comment-content">Write a comment</label>
                            <textarea class="form-control bg-body-tertiary border-0" id="comment-content" name="content" rows="3" maxlength="1000" required placeholder="Share your thoughts..." aria-describedby="comment-help @error('content') comment-error @enderror" @error('content') aria-invalid="true" @enderror>{{ old('content') }}</textarea>
                            @error('content')
                                <p id="comment-error" class="text-danger small mt-2" role="alert">{{ $message }}</p>
                            @enderror
                            <div class="d-flex align-items-center justify-content-between gap-3 mt-3">
                                <span class="small text-body-secondary" id="comment-help">Maximum 1,000 characters</span>
                                <button class="btn btn-primary rounded-pill px-4" type="submit">
                                    <i class="bi bi-send me-1" aria-hidden="true"></i>
                                    Send
                                </button>
                            </div>
                        </form>
                    @else
                        <div class="guest-comment-prompt d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 p-3 mb-3 rounded-3">
                            <div>
                                <p class="fw-semibold mb-1">Join the conversation</p>
                                <p class="small text-body-secondary mb-0">Log in or sign up to leave a comment.</p>
                            </div>
                            <div class="d-flex gap-2">
                                <a class="btn btn-light btn-sm border rounded-pill px-3" href="{{ route('login') }}">Log in</a>
                                <a class="btn btn-primary btn-sm rounded-pill px-3" href="{{ route('signup') }}">Sign up</a>
                            </div>
                        </div>
                    @endauth
                    @if (session('comment_status'))
                        <div class="alert alert-success" role="status">{{ session('comment_status') }}</div>
                    @endif
                    @forelse ($post->comments->sortByDesc('created_at') as $comment)
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

    @auth
    <div class="modal fade" id="deletePostModal" tabindex="-1" aria-labelledby="deletePostModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 shadow">
                <div class="modal-header border-0 px-4 pt-4 pb-2">
                    <div class="d-flex align-items-center gap-3">
                        <span class="delete-modal-icon d-inline-flex align-items-center justify-content-center rounded-circle" aria-hidden="true">
                            <i class="bi bi-trash3"></i>
                        </span>
                        <h2 class="modal-title h5 fw-bold mb-0" id="deletePostModalLabel">Delete this post?</h2>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 py-3 text-body-secondary">This action cannot be undone. The post and its conversation will be permanently removed.</div>
                <div class="modal-footer border-0 px-4 pt-0 pb-4">
                    <button class="btn btn-light border rounded-pill px-4" type="button" data-bs-dismiss="modal">Cancel</button>
                    <form class="m-0" action="{{ route('post.destroy', ['id' => $post->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger rounded-pill px-4" type="submit">
                            <i class="bi bi-trash3 me-1" aria-hidden="true"></i>
                            Delete post
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endauth
@endsection

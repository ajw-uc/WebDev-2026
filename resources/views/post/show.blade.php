@extends('layout.default')

@section('title', $post->user->name . "'s post")

@section('content')
    <a class="detail-back" href="{{ route('home') }}">← Back to home</a>
    <div class="detail-heading">
        <div><div class="eyebrow">A little conversation</div><h1>{{ $post->user->name }}'s post</h1></div>
        <div class="post-actions">
            <a class="btn btn-secondary" href="{{ route('post.edit', ['id' => $post->id]) }}">Edit</a>
            <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deletePostModal">Delete</button>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <x-post-card :post="$post"></x-post-card>
        </div>
    </div>
    <section class="card" id="comments" aria-labelledby="comments-heading">
        <div class="card-header profile-posts-header"><h2 id="comments-heading">Comments <span>{{ $post->comments->count() }}</span></h2></div>
        <div class="card-body">
            @auth
            <form class="comment-form" action="{{ route('post.comments.store', ['id' => $post->id]) }}" method="POST">
                @csrf
                <label class="form-label" for="comment-content">Leave a comment</label>
                <textarea class="form-control" id="comment-content" name="content" rows="3" maxlength="1000" required placeholder="Enter your comment ..." aria-describedby="comment-help @error('content') comment-error @enderror" @error('content') aria-invalid="true" @enderror>{{ old('content') }}</textarea>
                @error('content')
                    <p id="comment-error" class="text-danger mt-2" role="alert">{{ $message }}</p>
                @enderror
                <div class="composer-footer mt-3"><span id="comment-help">Max 1,000 characters</span><button class="btn btn-primary" type="submit">Post comment ↗</button></div>
            </form>
            @else
            <div class="text-center my-4">
                <h4>Let's build a connection to share your thoughts</h4>
                <p class="text-muted">Sign in to leave comments and join the conversation.</p>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('login') }}" class="btn btn-primary mx-2">Log in <span aria-hidden="true">↗</span></a>
                    <a href="{{ route('signup') }}" class="btn btn-secondary mx-2">Create account</a>
                </div>
            </div>
            @endif
            
            @if (session('comment_status'))
                <p class="comment-success" role="status">{{ session('comment_status') }}</p>
            @endif
            @forelse ($post->comments->sortByDesc('created_at') as $comment)
                <x-post-comment :comment="$comment"></x-post-comment>
            @empty
                <div class="empty-state"><div class="empty-icon" aria-hidden="true">✧</div><h3>No comments yet.</h3><p class="text-muted">It’s quiet here. Comments on this post will appear here.</p></div>
            @endforelse
        </div>
    </section>

    <div class="modal fade" id="deletePostModal" tabindex="-1" aria-labelledby="deletePostModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="deletePostModalLabel">Delete this post?</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">This action cannot be undone.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{ route('post.destroy', ['id' => $post->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

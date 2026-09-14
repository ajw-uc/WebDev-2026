@extends('layout.default')

@section('title', $post['author_name'] . "'s post")

@section('content')
    <a class="detail-back" href="{{ route('home') }}">← Back to home</a>
    <div class="detail-heading"><div><div class="eyebrow">A little conversation</div><h1>{{ $post['author_name'] }}'s post</h1></div></div>
    <div class="card mb-4">
        <div class="card-body">
            <x-post-card :post="$post"></x-post-card>
        </div>
    </div>
    <section class="card" id="comments" aria-labelledby="comments-heading">
        <div class="card-header profile-posts-header"><h2 id="comments-heading">Comments <span>{{ count($post['comments']) }}</span></h2></div>
        <div class="card-body">
            <form class="comment-form" action="{{ route('post.comments.store', $post['id']) }}" method="POST">
                @csrf
                <label class="form-label" for="comment-content">Leave a comment</label>
                <textarea class="form-control" id="comment-content" name="content" rows="3" maxlength="1000" required placeholder="Enter your comment ..." aria-describedby="comment-help @error('content') comment-error @enderror" @error('content') aria-invalid="true" @enderror>{{ old('content') }}</textarea>
                @error('content')
                    <p id="comment-error" class="text-danger mt-2" role="alert">{{ $message }}</p>
                @enderror
                <div class="composer-footer mt-3"><span id="comment-help">Max 1,000 characters</span><button class="btn btn-primary" type="submit">Post comment ↗</button></div>
            </form>
            @if (session('comment_status'))
                <p class="comment-success" role="status">{{ session('comment_status') }}</p>
            @endif
            @forelse ($post['comments'] as $comment)
                <x-post-comment :comment="$comment"></x-post-comment>
            @empty
                <div class="empty-state"><div class="empty-icon" aria-hidden="true">✧</div><h3>No comments yet.</h3><p class="text-muted">It’s quiet here. Comments on this post will appear here.</p></div>
            @endforelse
        </div>
    </section>
@endsection

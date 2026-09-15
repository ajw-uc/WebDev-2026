@extends('layout.default')

@section('title', 'Posts')

@section('content')
    <a class="detail-back" href="{{ route('home') }}">← Back to home</a>
    <div class="detail-heading"><div><div class="eyebrow">Latest from the Community</div><h1>Posts</h1></div></div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="feed">
                <?php foreach($posts as $post): ?>
                    <x-post-card :post="$post"></x-post-card>
                <?php endforeach; ?>
            </div>
            <div class="mt-3">
                {{ $posts->links()}}
            </div>
        </div>
    </div>
@endsection

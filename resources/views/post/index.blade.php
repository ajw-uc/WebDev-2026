@extends('layout.default')

@section('title', 'Community Conversations')

@section('content')
    <a class="detail-back" href="{{ route('home') }}">← Back to home</a>
    <div class="detail-heading">
        <div>
            <div class="eyebrow">Latest from the Community</div>
            <h1>{{ $posts->total() }} post{{ $posts->total() === 1 ? '' : 's' }}</h1>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <form class="post-filters" action="{{ route('post') }}" method="GET">
                <div>
                    <label class="visually-hidden" for="post-search">Search posts</label>
                    <input class="form-control" id="post-search" name="search" type="search" value="{{ request('search') }}" placeholder="Search posts or authors...">
                </div>
                <div>
                    <label class="visually-hidden" for="post-sort">Sort posts</label>
                    <select class="form-select" id="post-sort" name="sort" onchange="this.form.submit()">
                        <option value="latest" @selected(request('sort', 'latest') === 'latest')>Newest first</option>
                        <option value="oldest" @selected(request('sort') === 'oldest')>Oldest first</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Apply</button>
            </form>
            <div class="feed">
                <?php foreach($posts as $post): ?>
                    <x-post-card :post="$post"></x-post-card>
                <?php endforeach; ?>
            </div>
            <div class="mt-3">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection

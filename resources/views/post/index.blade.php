@extends('layout.default')

@section('title', 'Community Conversations')

@section('content')
    <a class="btn btn-light btn-sm rounded-pill mb-4" href="{{ route('home') }}">
        <i class="bi bi-arrow-left me-1" aria-hidden="true"></i>Back to home
    </a>

    <section class="card post-filter-card border-0 shadow-sm rounded-4 mb-4" aria-labelledby="filter-heading">
        <div class="card-body p-4">
            <div class="d-flex align-items-center justify-content-between gap-3 mb-3">
                <div>
                    <h2 class="h5 fw-bold mb-1" id="filter-heading">Find a post</h2>
                    <p class="small text-body-secondary mb-0">Search by content, author, or username.</p>
                </div>
                <span class="badge text-bg-light rounded-pill">{{ $posts->total() }} {{ Str::plural('post', $posts->total()) }}</span>
            </div>

            <form class="row g-2" action="{{ route('post') }}" method="GET" role="search">
                <div class="col-md">
                    <label class="visually-hidden" for="post-search">Search posts</label>
                    <div class="input-group">
                        <span class="input-group-text bg-body-tertiary border-0" aria-hidden="true"><i class="bi bi-search"></i></span>
                        <input class="form-control bg-body-tertiary border-0" id="post-search" name="search" type="search" value="{{ request('search') }}" placeholder="Search posts or authors...">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <label class="visually-hidden" for="post-sort">Sort posts</label>
                    <select class="form-select bg-body-tertiary border-0" id="post-sort" name="sort" onchange="this.form.submit()">
                        <option value="latest" @selected(request('sort', 'latest') === 'latest')>Newest first</option>
                        <option value="oldest" @selected(request('sort') === 'oldest')>Oldest first</option>
                    </select>
                </div>
                <div class="col-sm-auto d-flex gap-2">
                    <button class="btn btn-primary rounded-pill px-4" type="submit">
                        <i class="bi bi-funnel me-1" aria-hidden="true"></i>Apply
                    </button>
                </div>
            </form>
        </div>
    </section>

    @forelse ($posts as $post)
        <div class="mb-3">
            <x-post.card :post="$post"></x-post.card>
        </div>
    @empty
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body text-center p-5">
                <div class="post-empty-icon d-inline-flex align-items-center justify-content-center rounded-circle mb-3" aria-hidden="true">
                    <i class="bi bi-search"></i>
                </div>
                <h2 class="h5 fw-bold">No posts found</h2>
                <p class="text-body-secondary mb-3">Try another keyword or clear the current filters.</p>
                <a class="btn btn-light rounded-pill px-4" href="{{ route('post') }}">Clear filters</a>
            </div>
        </div>
    @endforelse

    @if ($posts->hasPages())
        {{ $posts->links() }}
    @endif
@endsection

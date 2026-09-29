@extends('layout.default')

@section('title', 'Notifications')

@section('content')
    @php($unreadOnPage = $notifications->getCollection()->whereNull('read_at')->count())
    <header class="d-flex flex-column flex-sm-row align-items-sm-end justify-content-between gap-3 mb-4">
        <div>
            <span class="badge text-bg-primary rounded-pill mb-2">Stay in the loop</span>
            <h1 class="display-6 fw-bold mb-1">Notifications</h1>
            <p class="text-body-secondary mb-0">See all the activity around your posts and profile.</p>
        </div>
        @if ($unreadOnPage > 0)
            <span class="badge text-bg-light rounded-pill px-3 py-2">{{ $unreadOnPage }} unread on this page</span>
        @endif
    </header>

    <section class="card border-0 rounded-4 shadow-sm overflow-hidden" aria-label="All notifications">
        @forelse ($notifications as $notification)
            <a class="notification-list-item d-flex align-items-center gap-3 p-4 text-reset text-decoration-none {{ $notification->read_at ? '' : 'is-unread' }}" href="{{ route('notifications.open', ['id' => $notification->id]) }}">
                <span class="notification-list-icon d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0" aria-hidden="true">
                    <i class="bi {{ isset($notification->data['post_id']) ? 'bi-chat-heart' : 'bi-person-plus' }}"></i>
                </span>
                <span class="flex-grow-1">
                    <span class="d-block fw-semibold">{{ $notification->data['message'] }}</span>
                    <small class="text-body-secondary"><i class="bi bi-clock me-1" aria-hidden="true"></i>{{ $notification->created_at->diffForHumans() }}</small>
                </span>
                @if (! $notification->read_at)
                    <span class="notification-unread-dot flex-shrink-0 rounded-circle" aria-label="Unread"></span>
                @else
                    <i class="bi bi-chevron-right text-body-tertiary" aria-hidden="true"></i>
                @endif
            </a>
        @empty
            <div class="notification-empty text-center p-5">
                <span class="notification-empty-icon d-inline-flex align-items-center justify-content-center rounded-circle mb-3" aria-hidden="true"><i class="bi bi-bell-slash"></i></span>
                <h2 class="h5 fw-bold">You're all caught up</h2>
                <p class="text-body-secondary mb-0">No notifications yet. New activity will appear here.</p>
            </div>
        @endforelse
    </section>

    @if ($notifications->hasPages())
        <div class="mt-4">{{ $notifications->links() }}</div>
    @endif
@endsection

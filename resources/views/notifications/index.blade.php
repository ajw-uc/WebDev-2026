@extends('layout.default')

@section('title', 'Notifications')

@section('content')
    <header class="page-intro">
        <div>
            <div class="eyebrow">Stay in the loop</div>
            <h1>Notifications</h1>
            <p>See all the activity around your posts and profile.</p>
        </div>
    </header>

    <section class="card notification-list" aria-label="All notifications">
        @forelse($notifications as $notification)
            <a class="notification-list-item {{ $notification->read_at ? '' : 'is-unread' }}" href="{{ route('notifications.open', ['id' => $notification->id]) }}">
                <span class="notification-list-icon" aria-hidden="true">✧</span>
                <span class="flex-grow-1">
                    <span class="d-block">{{ $notification->data['message'] }}</span>
                    <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                </span>
                @if (! $notification->read_at)<span class="notification-unread-dot" aria-label="Unread"></span>@endif
            </a>
        @empty
            <div class="notification-empty"><span aria-hidden="true">✧</span><h3>You’re all caught up.</h3><p>No notifications yet. New activity will appear here.</p></div>
        @endforelse
    </section>

    @if ($notifications->hasPages())
        <div class="mt-4">{{ $notifications->links() }}</div>
    @endif
@endsection

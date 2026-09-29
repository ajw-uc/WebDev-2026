<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mini Social')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('head')
</head>
<body class="bg-body-tertiary min-vh-100">
    <nav class="navbar navbar-expand bg-white border-bottom sticky-top" aria-label="Main navigation">
        <div class="container py-2">
            <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="{{ route('home') }}">
                <span class="navbar-brand-mark d-inline-flex align-items-center justify-content-center rounded-3 text-white" aria-hidden="true">✦</span>
                <span class="d-none d-sm-inline">Mini Social</span>
            </a>
            <div class="d-flex align-items-center gap-2 gap-sm-3">
                <a class="btn {{ request()->routeIs('home') ? 'btn-primary' : 'btn-light' }} btn-sm rounded-pill px-3" href="{{ route('home') }}">Home</a>
                <form class="navbar-search d-flex align-items-center rounded-pill bg-body-tertiary" action="{{ route('post') }}" method="GET" role="search">
                    <label class="visually-hidden" for="navbar-search-input">Search posts</label>
                    <input class="form-control form-control-sm border-0 bg-transparent shadow-none" id="navbar-search-input" name="search" type="search" value="{{ request('search') }}" placeholder="Search posts...">
                    <button class="btn btn-sm border-0 rounded-circle" type="submit" aria-label="Search">
                        <i class="bi bi-search" aria-hidden="true"></i>
                    </button>
                </form>
                @auth
                    @php
                        $latestNotifications = auth()->user()->notifications()->latest()->limit(10)->get();
                        $unreadNotificationsCount = auth()->user()->unreadNotifications()->count();
                    @endphp
                    <div class="dropdown">
                        <button class="notification-trigger btn btn-light rounded-circle p-0 position-relative" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Notifications{{ $unreadNotificationsCount ? ', ' . $unreadNotificationsCount . ' unread' : '' }}">
                            <i class="bi bi-bell" aria-hidden="true"></i>
                            @if ($unreadNotificationsCount > 0)
                                <span class="notification-count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $unreadNotificationsCount > 99 ? '99+' : $unreadNotificationsCount }}
                                    <span class="visually-hidden">unread notifications</span>
                                </span>
                            @endif
                        </button>
                        <div class="dropdown-menu dropdown-menu-end notification-menu p-0 overflow-hidden shadow border-0">
                            <div class="d-flex align-items-center justify-content-between px-3 py-3 border-bottom">
                                <h2 class="h6 fw-bold mb-0">Notifications</h2>
                                @if ($unreadNotificationsCount > 0)
                                    <span class="badge text-bg-primary rounded-pill">{{ $unreadNotificationsCount }} new</span>
                                @endif
                            </div>
                            @forelse ($latestNotifications as $notification)
                                <a class="notification-menu-item d-flex gap-3 px-3 py-3 text-reset text-decoration-none {{ $notification->read_at ? '' : 'is-unread' }}" href="{{ route('notifications.open', ['id' => $notification->id]) }}">
                                    <span class="notification-item-icon d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0" aria-hidden="true">
                                        <i class="bi {{ isset($notification->data['post_id']) ? 'bi-chat-heart' : 'bi-person-plus' }}"></i>
                                    </span>
                                    <span class="flex-grow-1">
                                        <span class="notification-message d-block small">{{ $notification->data['message'] }}</span>
                                        <small class="text-body-secondary">{{ $notification->created_at->diffForHumans() }}</small>
                                    </span>
                                    @if (! $notification->read_at)
                                        <span class="notification-unread-dot flex-shrink-0 rounded-circle" aria-label="Unread"></span>
                                    @endif
                                </a>
                            @empty
                                <div class="p-4 text-center">
                                    <div class="fs-2 text-primary mb-2"><i class="bi bi-check-circle" aria-hidden="true"></i></div>
                                    <p class="fw-semibold mb-1">You're all caught up</p>
                                    <p class="small text-body-secondary mb-0">New activity will appear here.</p>
                                </div>
                            @endforelse
                            <a class="notification-view-all d-block px-3 py-3 text-center text-decoration-none fw-semibold border-top" href="{{ route('notifications.index') }}">View all notifications <i class="bi bi-arrow-right ms-1" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <a class="rounded-circle" href="{{ route('me') }}" aria-label="My profile">
                        <img class="avatar avatar-sm rounded-circle border" src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('images/profile-avatar.svg') }}" alt="{{ auth()->user()->name }}'s profile picture">
                    </a>
                @else
                    <a class="btn btn-light btn-sm rounded-pill px-3" href="{{ route('login') }}">Log in</a>
                    <a class="btn btn-primary btn-sm rounded-pill px-3 d-none d-sm-inline-flex" href="{{ route('signup') }}">Sign up</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container py-3 py-lg-4">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>

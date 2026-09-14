<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mini Social Media')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('head')
</head>
<body>
    <nav class="navbar social-navbar" aria-label="Main navigation">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <span class="brand-mark" aria-hidden="true">✳</span>
                <span class="d-none d-sm-inline">
                    Mini Social<span class="brand-dot">.</span>
                </span>
            </a>
            <div class="nav-actions">
                <a class="home-link" href="{{ route('home') }}" @if(request()->routeIs('home')) aria-current="page"@endif>Home</a>
                <details class="notification-menu">
                    <summary class="notification-toggle" aria-label="Notifications">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9Z"/><path d="M10 21h4"/></svg>
                    </summary>
                    <section class="notification-panel" aria-labelledby="notification-heading">
                        <h2 id="notification-heading">Notifications</h2>
                        <div class="notification-empty"><span aria-hidden="true">✧</span><h3>You’re all caught up.</h3><p>No notifications yet. New activity will appear here.</p></div>
                    </section>
                </details>
                <a class="nav-profile" href="{{ route('me') }}" aria-label="My profile" @if(request()->routeIs('me')) aria-current="page"@endif>
                    <img src="{{ asset('images/profile-avatar.svg') }}" width="40" height="40" alt="My profile picture">
                </a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
</body>
@yield('scripts')
</html>

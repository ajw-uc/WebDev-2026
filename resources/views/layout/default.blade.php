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
                    <div class="dropdown">
                        <button class="btn btn-light rounded-circle p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Notifications" style="width: 2.5rem; height: 2.5rem;">
                            <i class="bi bi-bell" aria-hidden="true"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end notification-menu p-0 overflow-hidden shadow border-0">
                            <h2 class="h6 px-3 py-3 mb-0 border-bottom">Notifications</h2>
                            <div class="p-4 text-center">
                                <div class="fs-2 text-primary mb-2">
                                    <i class="bi bi-check-circle" aria-hidden="true"></i>
                                </div>
                                <p class="fw-semibold mb-1">You're all caught up</p>
                                <p class="small text-body-secondary mb-0">New activity will appear here.</p>
                            </div>
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
    @yield('scripts')
</body>
</html>

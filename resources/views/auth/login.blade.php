@extends('layout.default')

@section('title', 'Log in')

@section('content')
    <div class="auth-shell d-flex align-items-center justify-content-center py-4 py-lg-5">
        <section class="auth-card card border-0 rounded-4 shadow-sm" aria-labelledby="login-heading">
            <div class="card-body p-4 p-md-5">
                <span class="auth-badge d-inline-flex align-items-center justify-content-center rounded-3 text-white mb-4" aria-hidden="true">✦</span>
                <span class="badge text-bg-primary rounded-pill mb-2">Welcome back</span>
                <h1 class="h2 fw-bold mb-2" id="login-heading">Log in to your space</h1>
                <p class="text-body-secondary mb-4">Continue sharing the moments that matter.</p>
                <form class="auth-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <x-form.group>
                        <x-form.input type="email" name="email" label="Email" placeholder="you@example.com" autocomplete="email" required autofocus />
                    </x-form.group>
                    <x-form.group>
                        <x-form.input type="password" name="password" label="Password" placeholder="Enter your password" autocomplete="current-password" required />
                    </x-form.group>
                    <div class="form-check mb-4">
                        <input class="form-check-input" id="remember" type="checkbox" name="remember" value="1" @checked(old('remember'))>
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <button class="btn btn-primary rounded-pill w-100 py-2 fw-semibold" type="submit">Log in <i class="bi bi-arrow-right ms-1" aria-hidden="true"></i></button>
                </form>
                <p class="text-center text-body-secondary mt-4 mb-0">New here? <a class="fw-semibold" href="{{ route('signup') }}">Create an account</a></p>
            </div>
        </section>
    </div>
@endsection

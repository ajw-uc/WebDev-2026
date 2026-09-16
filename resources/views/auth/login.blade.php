@extends('layout.default')
@section('title', 'Log in')
@section('content')
<div class="auth-shell">
    <div class="auth-card">
        <div class="eyebrow">Welcome back</div>
        <h1>Log in to your space.</h1>
        <p class="text-muted">Continue sharing the moments that matter.</p>
        <form method="POST" action="{{ route('login') }}">@csrf
        <x-form.group>
            <x-form.input type="email" name="email" label="Email" required autofocus />
        </x-form.group>
        <x-form.group>
            <x-form.input type="password" name="password" label="Password" required />
        </x-form.group>
        <label class="auth-check">
            <input type="checkbox" name="remember" value="1"> Remember me
        </label>
        <button class="btn btn-primary w-100 mt-3" type="submit">Log in ↗</button>
    </form>
    <p class="auth-switch">New here? <a href="{{ route('signup') }}">Create an account</a></p>
    </div>
</div>
@endsection

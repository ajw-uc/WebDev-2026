@extends('layout.default')
@section('title', 'Verify email')
@section('content')
<div class="auth-shell"><div class="auth-card">
    <div class="auth-badge">✉</div><div class="eyebrow">Verify your email</div>
    <h1>Check your inbox.</h1>
    <p class="text-muted">We sent a verification link to <strong>{{ auth()->user()->email }}</strong>.</p>
    @if (session('status'))<p class="text-success">{{ session('status') }}</p>@endif
    <form method="POST" action="{{ route('verification.send') }}">@csrf
        <button class="btn btn-primary w-100" type="submit">Resend verification email</button>
    </form>
</div></div>
@endsection

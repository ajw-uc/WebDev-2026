@extends('layout.default')
@section('title', 'Sign up')
@section('content')
<div class="auth-shell"><div class="auth-card"><div class="auth-badge">✦</div><div class="eyebrow">Join the community</div><h1>Make room for your story.</h1><p class="text-muted">Create an account and start connecting.</p>
<form method="POST" action="{{ route('signup') }}">@csrf
<x-form.group>
    <x-form.input name="name" label="Name" required autofocus />
</x-form.group>
<x-form.group>
    <x-form.input name="username" label="Username" required />
</x-form.group>
<x-form.group>
    <x-form.input type="email" name="email" label="Email" required />
</x-form.group>
<div class="form-grid">
    <x-form.group>
        <x-form.input type="password" name="password" label="Password" required />
    </x-form.group>
    <x-form.group>
        <x-form.input type="password" name="password_confirmation" label="Confirm password" required />
    </x-form.group>
</div>
<x-form.group>
    <x-form.label for="captcha" name="CAPTCHA" />
    <img src="{{ $captchaImage }}" alt="CAPTCHA image" class="mb-2">
    <x-form.input name="captcha" aria-label="CAPTCHA answer" required />
</x-form.group>
<button class="btn btn-primary w-100 mt-2" type="submit">Create account <span aria-hidden="true">↗</span></button></form>
<p class="auth-switch">Already have an account? <a href="{{ route('login') }}">Log in</a></p></div></div>
@endsection

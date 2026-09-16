@extends('layout.default')

@section('title', 'Change Password')

@section('content')
    <div class="auth-shell password-shell">
        <div class="auth-card">
            <div class="auth-badge">⌁</div>
            <div class="eyebrow">Account security</div>
            <h1>Change password.</h1>
            <p class="text-muted">Choose a strong password you do not use anywhere else.</p>
            <form action="{{ route('password.update') }}" method="post">
            @csrf
            @method('PUT')
            <x-form.group><x-form.input type="password" name="current_password" label="Current password" required autofocus /></x-form.group>
            <x-form.group><x-form.input type="password" name="password" label="New password" required /></x-form.group>
            <p class="password-hint">Use at least 8 characters with a mix of letters and numbers.</p>
            <x-form.group><x-form.input type="password" name="password_confirmation" label="Confirm new password" required /></x-form.group>
            <div class="password-actions">
                <button type="submit" class="btn btn-primary">Update password <span aria-hidden="true">↗</span></button>
                <a href="{{ route('me') }}" class="btn btn-secondary">Cancel</a>
            </div>
            </form>
        </div>
    </div>
@endsection

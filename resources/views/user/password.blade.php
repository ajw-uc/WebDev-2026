@extends('layout.default')

@section('title', 'Change Password')

@section('content')
    <div class="auth-shell d-flex align-items-center justify-content-center py-4 py-lg-5">
        <section class="auth-card card border-0 rounded-4 shadow-sm" aria-labelledby="password-heading">
            <div class="card-body p-4 p-md-5">
                <span class="auth-badge d-inline-flex align-items-center justify-content-center rounded-3 text-white mb-4" aria-hidden="true"><i class="bi bi-shield-lock"></i></span>
                <span class="badge text-bg-primary rounded-pill mb-2">Account security</span>
                <h1 class="h2 fw-bold mb-2" id="password-heading">Change password</h1>
                <p class="text-body-secondary mb-4">Choose a strong password you do not use anywhere else.</p>
                <form class="auth-form" action="{{ route('password.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <x-form.group><x-form.input type="password" name="current_password" label="Current password" autocomplete="current-password" required autofocus /></x-form.group>
                    <x-form.group><x-form.input type="password" name="password" label="New password" autocomplete="new-password" required /><div class="form-text">Use at least 8 characters.</div></x-form.group>
                    <x-form.group><x-form.input type="password" name="password_confirmation" label="Confirm new password" autocomplete="new-password" required /></x-form.group>
                    <div class="d-flex flex-column-reverse flex-sm-row gap-2 pt-3">
                        <a href="{{ route('me') }}" class="btn btn-light border rounded-pill px-4 flex-sm-fill">Cancel</a>
                        <button type="submit" class="btn btn-primary rounded-pill px-4 flex-sm-fill"><i class="bi bi-check2-circle me-1" aria-hidden="true"></i>Update password</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

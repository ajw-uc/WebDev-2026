@extends('layout.default')

@section('title', 'Verify email')

@section('content')
    <div class="auth-shell d-flex align-items-center justify-content-center py-4 py-lg-5">
        <section class="auth-card card border-0 rounded-4 shadow-sm" aria-labelledby="verify-email-heading">
            <div class="card-body p-4 p-md-5 text-center">
                <span class="auth-badge d-inline-flex align-items-center justify-content-center rounded-3 text-white mb-4" aria-hidden="true">
                    <i class="bi bi-envelope-check"></i>
                </span>
                <span class="badge text-bg-primary rounded-pill d-table mx-auto mb-2">One last step</span>
                <h1 class="h2 fw-bold mb-2" id="verify-email-heading">Check your inbox</h1>
                <p class="text-body-secondary mb-3">We sent a verification link to:</p>
                <p class="d-inline-flex align-items-center gap-2 bg-body-tertiary rounded-pill px-3 py-2 mb-4">
                    <i class="bi bi-envelope text-primary" aria-hidden="true"></i>
                    <strong class="text-break">{{ auth()->user()->email }}</strong>
                </p>

                @if (session('status'))
                    <div class="alert alert-success border-0 rounded-3 text-start" role="status">
                        <i class="bi bi-check-circle me-2" aria-hidden="true"></i>{{ session('status') }}
                    </div>
                @endif

                <div class="text-start bg-body-tertiary rounded-3 p-3 mb-4">
                    <p class="fw-semibold mb-2"><i class="bi bi-info-circle text-primary me-2" aria-hidden="true"></i>What to do next</p>
                    <ol class="small text-body-secondary mb-0 ps-4">
                        <li class="mb-1">Open the verification email we sent you.</li>
                        <li class="mb-1">Click the verification button in the email.</li>
                        <li>Return here to continue using your account.</li>
                    </ol>
                </div>

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button class="btn btn-primary rounded-pill w-100 py-2 fw-semibold" type="submit">
                        <i class="bi bi-send me-1" aria-hidden="true"></i>Resend verification email
                    </button>
                </form>
                <p class="small text-body-secondary mt-3 mb-4">Didn't receive it? Check your spam folder or request a new email.</p>

                <form class="pt-4 border-top" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-link text-body-secondary text-decoration-none p-0" type="submit">
                        <i class="bi bi-box-arrow-left me-1" aria-hidden="true"></i>Log out and use another account
                    </button>
                </form>
            </div>
        </section>
    </div>
@endsection

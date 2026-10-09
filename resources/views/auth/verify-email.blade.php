@extends('layout.default')
@section('title', 'Verify email')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <section class="card border-0 rounded-4 shadow-sm" aria-labelledby="network-heading">
                <div class="card-body p-4">
                    <div class="mb-4">
                        <span class="badge text-bg-primary rounded-pill mb-2">Verify your email</span>
                        <h1 class="display-6 fw-bold mb-1">Check your inbox.</h1>
                        <p class="text-body-secondary mb-0">We sent a verification link to <strong>{{ auth()->user()->email }}</strong>.</p>
                    </div>
                    <form method="POST" action="{{ route('verification.send') }}">@csrf
                        <button class="btn btn-primary w-100" type="submit">Resend verification email</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection

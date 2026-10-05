@extends('layout.default')

@section('title', 'Sign up')

@section('content')
    <div class="auth-shell d-flex align-items-center justify-content-center py-4 py-lg-5">
        <section class="auth-card card border-0 rounded-4 shadow-sm" aria-labelledby="signup-heading">
            <div class="card-body p-4 p-md-5">
                <span class="auth-badge d-inline-flex align-items-center justify-content-center rounded-3 text-white mb-4" aria-hidden="true">✦</span>
                <span class="badge text-bg-primary rounded-pill mb-2">Join the community</span>
                <h1 class="h2 fw-bold mb-2" id="signup-heading">Make room for your story</h1>
                <p class="text-body-secondary mb-4">Create an account and start connecting.</p>
                <form class="auth-form" method="POST" action="{{ route('signup') }}">
                    @csrf
                    <x-form.group>
                        <x-form.input name="name" label="Name" placeholder="Your full name" autocomplete="name" :value="old('name')" required autofocus />
                    </x-form.group>
                    <x-form.group>
                        <x-form.input name="username" label="Username" placeholder="your_username" autocomplete="username" :value="old('username')" required />
                    </x-form.group>
                    <x-form.group>
                        <x-form.input type="email" name="email" label="Email" placeholder="you@example.com" autocomplete="email" :value="old('email')" required />
                    </x-form.group>
                    <x-form.group>
                        <x-form.input type="password" name="password" label="Password" placeholder="At least 8 characters" autocomplete="new-password" required />
                    </x-form.group>
                    <x-form.group>
                        <x-form.input type="password" name="password_confirmation" label="Confirm password" placeholder="Repeat your password" autocomplete="new-password" required />
                    </x-form.group>
                    <x-form.group>
                        <x-form.label for="captcha">CAPTCHA</x-form.label>
                        <div>
                            <img src="{{ $captchaImage }}" alt="CAPTCHA image" class="mb-2">
                        </div>
                        <x-form.input name="captcha" placeholder="CAPTCHA answer" required />
                    </x-form.group>
                    <button class="btn btn-primary rounded-pill w-100 py-2 fw-semibold mt-2" type="submit">Create account <i class="bi bi-arrow-right ms-1" aria-hidden="true"></i></button>
                </form>
                <p class="text-center text-body-secondary mt-4 mb-0">Already have an account? <a class="fw-semibold" href="{{ route('login') }}">Log in</a></p>
            </div>
        </section>
    </div>
@endsection

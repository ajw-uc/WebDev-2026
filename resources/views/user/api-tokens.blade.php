@extends('layout.default')

@section('title', 'API Tokens')

@section('content')
<div class="auth-shell"><div class="auth-card">
    <div class="eyebrow">Developer access</div>
    <h1>API tokens.</h1>
    <p class="text-muted">Create a token to authenticate requests to the REST API. The secret is shown only once.</p>
    @if (session('status'))<p class="text-success">{{ session('status') }}</p>@endif
    @if (isset($plainTextToken))
        <div class="alert alert-warning"><strong>Copy this token now:</strong><br><code>{{ $plainTextToken }}</code></div>
    @endif
    <form method="POST" action="{{ route('api-tokens.store') }}" class="mb-4">@csrf
        <x-form.input name="name" label="Token name" required />
        <button class="btn btn-primary w-100 mt-2" type="submit">Create token</button>
    </form>
    <h2 class="h5">Active tokens</h2>
    @forelse ($tokens as $token)
        <div class="d-flex justify-content-between align-items-center border-bottom py-2">
            <span>{{ $token->name }}<small class="d-block text-muted">{{ $token->created_at->diffForHumans() }}</small></span>
            <form method="POST" action="{{ route('api-tokens.destroy', $token) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" type="submit">Revoke</button></form>
        </div>
    @empty
        <p class="text-muted">No active API tokens.</p>
    @endforelse
</div></div>
@endsection

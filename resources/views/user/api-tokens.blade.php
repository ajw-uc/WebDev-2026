@extends('layout.default')

@section('title', 'API Tokens')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-7">
            <a class="btn btn-light btn-sm rounded-pill mb-4" href="{{ route('me') }}">
                <i class="bi bi-arrow-left me-1" aria-hidden="true"></i>Back to profile
            </a>

            <header class="mb-4">
                <span class="badge text-bg-primary rounded-pill mb-2">Developer access</span>
                <h1 class="display-6 fw-bold mb-2">API tokens</h1>
                <p class="text-body-secondary mb-0">Create personal tokens to authenticate requests to the REST API.</p>
            </header>

            @if (session('status'))
                <div class="alert alert-success border-0 rounded-3 shadow-sm" role="status">
                    <i class="bi bi-check-circle me-2" aria-hidden="true"></i>{{ session('status') }}
                </div>
            @endif

            @if (isset($plainTextToken))
                <div class="token-secret-alert alert border-0 rounded-4 p-4 shadow-sm" role="alert">
                    <div class="d-flex align-items-start gap-3">
                        <span class="token-secret-icon d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0" aria-hidden="true"><i class="bi bi-key"></i></span>
                        <div class="min-w-0 flex-grow-1">
                            <h2 class="h5 fw-bold mb-1">Copy your new token now</h2>
                            <p class="small mb-3">For security, this token will not be shown again.</p>
                            <div class="token-secret d-flex align-items-center gap-2 rounded-3 p-2">
                                <code class="flex-grow-1 px-2" id="plain-text-token">{{ $plainTextToken }}</code>
                                <button class="btn btn-dark btn-sm rounded-pill px-3 flex-shrink-0" type="button" data-copy-token data-copy-target="plain-text-token">
                                    <i class="bi bi-copy me-1" aria-hidden="true"></i><span>Copy</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <section class="card border-0 rounded-4 shadow-sm mb-4" aria-labelledby="create-token-heading">
                <div class="card-body p-4 p-md-5">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <span class="token-section-icon d-inline-flex align-items-center justify-content-center rounded-circle" aria-hidden="true"><i class="bi bi-plus-lg"></i></span>
                        <div>
                            <h2 class="h5 fw-bold mb-1" id="create-token-heading">Create a new token</h2>
                            <p class="small text-body-secondary mb-0">Use a descriptive name so you remember where it is used.</p>
                        </div>
                    </div>
                    <form class="api-token-form" method="POST" action="{{ route('api-tokens.store') }}">
                        @csrf
                        <x-form.input name="name" label="Token name" placeholder="e.g. Local development" autocomplete="off" required />
                        <div class="d-flex justify-content-end mt-4 pt-4 border-top">
                            <button class="btn btn-primary rounded-pill px-4" type="submit"><i class="bi bi-key me-1" aria-hidden="true"></i>Create token</button>
                        </div>
                    </form>
                </div>
            </section>

            <section class="card border-0 rounded-4 shadow-sm overflow-hidden" aria-labelledby="active-tokens-heading">
                <div class="card-header bg-white border-0 d-flex align-items-center justify-content-between gap-3 px-4 pt-4 pb-3">
                    <div>
                        <h2 class="h5 fw-bold mb-1" id="active-tokens-heading">Active tokens</h2>
                        <p class="small text-body-secondary mb-0">Revoke tokens you no longer recognize or use.</p>
                    </div>
                    <span class="badge text-bg-light rounded-pill">{{ $tokens->count() }}</span>
                </div>
                <div class="card-body p-0">
                    @forelse ($tokens as $token)
                        <article class="api-token-item d-flex align-items-center justify-content-between gap-3 px-4 py-3">
                            <div class="d-flex align-items-center gap-3 min-w-0">
                                <span class="token-item-icon d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0" aria-hidden="true"><i class="bi bi-key-fill"></i></span>
                                <div class="min-w-0">
                                    <h3 class="h6 fw-semibold text-truncate mb-1">{{ $token->name }}</h3>
                                    <p class="small text-body-secondary mb-0">Created {{ $token->created_at->diffForHumans() }}@if ($token->last_used_at) · Last used {{ $token->last_used_at->diffForHumans() }}@endif</p>
                                </div>
                            </div>
                            <button class="btn btn-light btn-sm border text-danger rounded-pill px-3 flex-shrink-0" type="button" data-bs-toggle="modal" data-bs-target="#revokeTokenModal{{ $token->id }}">
                                <i class="bi bi-trash3 me-1" aria-hidden="true"></i>Revoke
                            </button>
                        </article>

                        <div class="modal fade" id="revokeTokenModal{{ $token->id }}" tabindex="-1" aria-labelledby="revokeTokenModalLabel{{ $token->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 rounded-4 shadow">
                                    <div class="modal-header border-0 px-4 pt-4 pb-2">
                                        <div class="d-flex align-items-center gap-3">
                                            <span class="delete-modal-icon d-inline-flex align-items-center justify-content-center rounded-circle" aria-hidden="true"><i class="bi bi-key"></i></span>
                                            <h2 class="modal-title h5 fw-bold mb-0" id="revokeTokenModalLabel{{ $token->id }}">Revoke this token?</h2>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-4 py-3 text-body-secondary">Applications using <strong>{{ $token->name }}</strong> will immediately lose API access.</div>
                                    <div class="modal-footer border-0 px-4 pt-0 pb-4">
                                        <button class="btn btn-light border rounded-pill px-4" type="button" data-bs-dismiss="modal">Cancel</button>
                                        <form method="POST" action="{{ route('api-tokens.destroy', $token) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger rounded-pill px-4" type="submit"><i class="bi bi-trash3 me-1" aria-hidden="true"></i>Revoke token</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center px-4 py-5">
                            <span class="token-empty-icon d-inline-flex align-items-center justify-content-center rounded-circle mb-3" aria-hidden="true"><i class="bi bi-key"></i></span>
                            <h3 class="h5 fw-bold">No active tokens</h3>
                            <p class="text-body-secondary mb-0">Create a token above when you need API access.</p>
                        </div>
                    @endforelse
                </div>
            </section>
        </div>
    </div>
@endsection

@if (isset($plainTextToken))
    @push('scripts')
        <script>
            document.querySelector('[data-copy-token]')?.addEventListener('click', async (event) => {
                const button = event.currentTarget;
                const token = document.getElementById(button.dataset.copyTarget)?.textContent.trim();

                if (! token) {
                    return;
                }

                await navigator.clipboard.writeText(token);
                button.querySelector('span').textContent = 'Copied';
                button.querySelector('i').className = 'bi bi-check2 me-1';
            });
        </script>
    @endpush
@endif

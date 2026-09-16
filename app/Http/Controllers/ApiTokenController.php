<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ApiTokenController extends Controller
{
    public function index(Request $request): View
    {
        return view('user.api-tokens', ['tokens' => $request->user()->tokens()->latest()->get()]);
    }

    public function store(Request $request): View
    {
        $validated = $request->validate(['name' => ['required', 'string', 'max:255']]);
        $token = $request->user()->createToken($validated['name']);

        return view('user.api-tokens', [
            'tokens' => $request->user()->tokens()->latest()->get(),
            'plainTextToken' => $token->plainTextToken,
        ]);
    }

    public function destroy(Request $request, string $tokenId): RedirectResponse
    {
        $request->user()->tokens()->whereKey($tokenId)->delete();

        return back()->with('status', 'API token revoked.');
    }
}

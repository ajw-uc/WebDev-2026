<?php

namespace App\Http\Controllers;

use App\Models\User;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function showSignup(Request $request): View
    {
        $captcha = CaptchaBuilder::create();
        $captcha->build(180, 50);

        session(['signup_captcha_phrase' => $captcha->getPhrase()]);

        return view('auth.signup', ['captchaImage' => $captcha->inline()]);
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);
        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()->withErrors(['email' => 'Email atau password salah.'])->onlyInput('email');
        }
        $request->session()->regenerate();

        return redirect()->intended(route('home'));
    }

    public function signup(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:50', 'alpha_dash', 'unique:users,username'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'captcha' => ['required', 'string'],
        ]);

        $expectedPhrase = $request->session()->get('signup_captcha_phrase');
        if ($expectedPhrase === '' || $expectedPhrase !== $validated['captcha']) {
            return back()->withErrors([
                'captcha' => 'Wrong Captcha'
            ]);
        }

        $request->session()->forget('signup_captcha_phrase');
        $user = User::create($validated);
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended(route('home'));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

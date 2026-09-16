<?php

namespace App\Http\Controllers;

use App\Mail\FollowedUsersFeedMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FollowedUsersFeedController extends Controller
{
    public function preview(Request $request): FollowedUsersFeedMail
    {
        return new FollowedUsersFeedMail($request->user());
    }

    public function send(Request $request): RedirectResponse
    {
        Mail::to($request->user()->email)->queue(new FollowedUsersFeedMail($request->user()));

        return back()->with('status', 'Feed berhasil dikirim ke email Anda.');
    }
}

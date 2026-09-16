<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use App\Notifications\FollowNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class UserController extends Controller
{
    // Menampilkan halaman profil pengguna
    public function index(Request $request): View
    {
        $user = $request->user();
        $posts = $user->posts()->latest()->paginate(10);

        return view('user.index', ['user' => $user, 'posts' => $posts]);
    }

    public function network(Request $request, ?string $id = null): View
    {
        $user = $id === null ? $request->user() : User::findOrFail($id);

        $tab = $request->query('tab', 'followers');
        if (! in_array($tab, ['followers', 'following'])) {
            $tab = 'followers';
        }

        $people = $user->{$tab}()
            ->orderBy('name')
            ->paginate(15)
            ->withQueryString();

        $followingIds = $request->user()?->following()->pluck('users.id') ?? collect();
        $isOwnNetwork = $request->user()?->is($user) ?? false;

        return view($isOwnNetwork ? 'user.index_network' : 'user.show_network', compact('user', 'tab', 'people', 'followingIds'));
    }

    // Menampilkan profil pengguna berdasarkan ID
    public function show(Request $request, string $id): View
    {
        $user = User::findOrFail($id);
        $posts = $user->posts()->latest()->paginate(10);

        $isFollowing = $request->user()?->following()->where('following_user_id', $user->id)->exists() ?? false;

        return view('user.show', ['user' => $user, 'posts' => $posts, 'isFollowing' => $isFollowing]);
    }

    public function follow(Request $request, string $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        abort_if($request->user()->is($user), 403, 'You cannot follow yourself.');

        $follow = Follow::firstOrCreate([
            'follower_user_id' => $request->user()->id,
            'following_user_id' => $user->id,
        ]);

        if ($follow->wasRecentlyCreated) {
            $user->notify(new FollowNotification($request->user()));
        }

        return back();
    }

    public function unfollow(Request $request, string $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        $request->user()->following()->detach($user->id);

        return back();
    }

    // Menampilkan form untuk mengedit profil
    public function edit(Request $request): View
    {
        $user = $request->user();

        return view('user.edit', ['user' => $user]);
    }

    // Memperbarui profil pengguna
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username,'.$request->user()->id],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,'.$request->user()->id],
            'bio' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $user = $request->user();
        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            $validated['image'] = $request->file('image')->store("profile/image/{$user->id}", 'public');
        }
        $user->update($validated);

        return redirect()->route('me');
    }

    public function editPassword(): View
    {
        return view('user.password');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = $request->user();
        $user->password = Hash::make($validated['password']);
        $user->save();

        return redirect()->route('me')->with('status', 'Password updated successfully.');
    }
}

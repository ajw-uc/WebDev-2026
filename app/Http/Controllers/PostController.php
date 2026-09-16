<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Throwable;

class PostController extends Controller
{
    // Menampilkan post dengan filter
    public function index(Request $request): View
    {
        $search = trim($request->query('search', ''));
        $sort = $request->query('sort', 'latest');

        // cari post berdasarkan content, username, atau nama user
        $posts = Post::where(function (Builder $query) use ($search) {
            $query->where('content', 'like', "%{$search}%")
                ->orWhereHas('user', function (Builder $userQuery) use ($search) {
                    $userQuery->where('name', 'like', "%{$search}%")
                        ->orWhere('username', 'like', "%{$search}%");
                });
        })->orderBy('created_at', $sort === 'oldest' ? 'asc' : 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('post.index', ['posts' => $posts]);
    }

    // Menampilkan form untuk membuat post baru
    public function create(): View
    {
        return view('post.create');
    }

    // Menyimpan post baru
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'content' => 'required|string|max:255',
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $storedImage = null;

        try {
            $post = DB::transaction(function () use ($request, $validated, &$storedImage): Post {
                $post = Post::create([
                    'user_id' => $request->user()->id,
                    'content' => $validated['content'],
                ]);

                if ($request->hasFile('image')) {
                    $storedImage = $request->file('image')->storeAs(
                        "post/image/{$post->id}",
                        Str::uuid().'.'.$request->file('image')->extension(),
                        'public'
                    );
                    $post->image = $storedImage;
                    $post->save();
                }

                return $post;
            });
        } catch (Throwable $exception) {
            if ($storedImage !== null) {
                Storage::disk('public')->delete($storedImage);
            }

            throw $exception;
        }

        return redirect()->route('post.show', ['id' => $post->id]);
    }

    // Menampilkan detail post
    public function show(string $id): View
    {
        $post = Post::findOrFail($id);

        return view('post.show', ['post' => $post]);
    }

    // Menyimpan komentar pada post
    public function storeComment(Request $request, string $id): RedirectResponse
    {
        $post = Post::findOrFail($id);
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Comment::create([
            'post_id' => $post->id,
            'user_id' => $request->user()->id,
            'content' => $validated['content'],
        ]);

        return redirect()->route('post.show', ['id' => $post->id])->with('comment_status', 'Comment added.');
    }

    // Memberikan atau menghapus like pada post
    public function toggleLike(Request $request, string $id): JsonResponse|RedirectResponse
    {
        $post = Post::findOrFail($id);
        $like = $post->likes()->where('user_id', $request->user()->id)->first();

        if ($like) {
            $like->delete();
        } else {
            Like::create(['post_id' => $post->id, 'user_id' => $request->user()->id]);
        }

        if ($request->expectsJson()) {
            return response()->json([
                'liked' => ! $like,
                'likes_count' => $post->likes()->count(),
            ]);
        }

        return back();
    }

    // Menghapus komentar pada post
    public function destroyComment(string $id, string $commentId): RedirectResponse
    {
        $post = Post::findOrFail($id);
        $comment = $post->comments()->findOrFail($commentId);
        Gate::authorize('delete', $comment);
        $comment->delete();

        return redirect()->route('post.show', ['id' => $post->id])->with('comment_status', 'Comment deleted.');
    }

    // Menampilkan form untuk mengedit post
    public function edit(string $id): View
    {
        $post = Post::findOrFail($id);
        Gate::authorize('update', $post);

        return view('post.edit', ['post' => $post]);
    }

    // Mengubah post
    public function update(Request $request, string $id): RedirectResponse
    {
        $post = Post::findOrFail($id);
        Gate::authorize('update', $post);
        $validated = $request->validate([
            'content' => 'required|string|max:255',
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'remove_image' => ['nullable', 'boolean'],
        ]);

        $post->content = $validated['content'];

        if ($request->hasFile('image')) {
            $oldImage = $post->image;
            $post->image = $request->file('image')->store("post/image/{$post->id}", 'public');
            if ($oldImage) {
                Storage::disk('public')->delete($oldImage);
            }
        } elseif ($request->boolean('remove_image') && $post->image) {
            Storage::disk('public')->delete($post->image);
            $post->image = null;
        }

        $post->save();

        return redirect()->route('post.show', ['id' => $post->id]);
    }

    // Menghapus post
    public function destroy(string $id): RedirectResponse
    {
        $post = Post::findOrFail($id);
        Gate::authorize('delete', $post);
        $post->delete();

        return redirect()->route('post');
    }
}

<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Http\Resources\PostResource;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Notifications\CommentNotification;
use App\Notifications\LikeNotification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return PostResource::collection(Post::with('user')->withCount(['comments', 'likes'])->latest()->paginate(10));
    }

    public function show(Post $post): PostResource
    {
        return new PostResource($post->load(['user', 'comments.user'])->loadCount(['comments', 'likes']));
    }

    public function store(Request $request): PostResource
    {
        $validated = $request->validate([
            'content' => ['required', 'string', 'max:255'],
        ]);

        $post = Post::create([
            'user_id' => $request->user()->id,
            'content' => $validated['content'],
        ]);

        return new PostResource($post->load('user'));
    }

    public function comment(Request $request, Post $post): JsonResponse
    {
        $validated = $request->validate([
            'content' => ['required', 'string', 'max:1000'],
        ]);
        $comment = Comment::create([
            'post_id' => $post->id,
            'user_id' => $request->user()->id,
            'content' => $validated['content'],
        ]);

        if (! $post->user->is($request->user())) {
            $post->user->notify(new CommentNotification($request->user(), $post));
        }

        return (new CommentResource($comment->load('user')))->response()->setStatusCode(201);
    }

    public function comments(Post $post): AnonymousResourceCollection
    {
        return CommentResource::collection($post->comments()->with('user')->latest()->paginate(10));
    }

    public function like(Request $request, Post $post): JsonResponse
    {
        $like = $post->likes()->where('user_id', $request->user()->id)->first();

        if ($like) {
            $like->delete();
        } else {
            Like::create(['post_id' => $post->id, 'user_id' => $request->user()->id]);

            if (! $post->user->is($request->user())) {
                $post->user->notify(new LikeNotification($request->user(), $post));
            }
        }

        return response()->json(['liked' => ! $like, 'likes_count' => $post->likes()->count()]);
    }

    public function update(Request $request, Post $post): PostResource
    {
        Gate::forUser($request->user())->authorize('update', $post);
        $validated = $request->validate(['content' => ['required', 'string', 'max:255']]);
        $post->update($validated);

        return new PostResource($post->fresh()->load('user'));
    }

    public function destroy(Request $request, Post $post): JsonResponse
    {
        Gate::forUser($request->user())->authorize('delete', $post);
        $post->delete();

        return response()->json(status: 204);
    }

    public function destroyComment(Request $request, Post $post, Comment $comment): JsonResponse
    {
        abort_unless($comment->post_id === $post->id, 404);
        Gate::forUser($request->user())->authorize('delete', $comment);
        $comment->delete();

        return response()->json(status: 204);
    }
}

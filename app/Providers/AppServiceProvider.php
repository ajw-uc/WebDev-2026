<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Post;
use App\Policies\CommentPolicy;
use App\Policies\PostPolicy;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        // Optional, to explicitly map the policies to their models.
        Gate::policy(Post::class, PostPolicy::class);
        Gate::policy(Comment::class, CommentPolicy::class);

        // Rate limiter rules
        RateLimiter::for('login', function (Request $request): Limit {
            return Limit::perMinute(5)->by($request->ip());
        });

        RateLimiter::for('signup', function (Request $request): Limit {
            return Limit::perMinute(3)->by($request->ip());
        });

        RateLimiter::for('post', function (Request $request): Limit {
            return Limit::perMinute(10)->by($request->user()->getAuthIdentifier().'|'.$request->ip());
        });

        RateLimiter::for('comment', function (Request $request): Limit {
            return Limit::perMinute(20)->by($request->user()->getAuthIdentifier().'|'.$request->ip());
        });
    }
}

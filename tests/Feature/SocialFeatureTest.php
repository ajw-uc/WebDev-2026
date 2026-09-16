<?php

use App\Models\Post;
use App\Models\User;
use App\Notifications\CommentNotification;
use App\Notifications\FollowNotification;
use App\Notifications\LikeNotification;
use Illuminate\Support\Facades\Notification;

it('creates a post for a verified user', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->post(route('post.store'), ['content' => 'Hello world'])
        ->assertRedirect();

    $this->assertDatabaseHas('posts', ['user_id' => $user->id, 'content' => 'Hello world']);
});

it('creates a comment and notifies the post owner', function () {
    Notification::fake();
    $owner = User::factory()->create();
    $commenter = User::factory()->create();
    $post = Post::factory()->create(['user_id' => $owner->id]);

    $this->actingAs($commenter)->post(route('post.comments.store', $post), ['content' => 'Nice post'])
        ->assertRedirect(route('post.show', $post));

    Notification::assertSentTo($owner, CommentNotification::class);
});

it('likes and unlikes a post and notifies the owner only when liked', function () {
    Notification::fake();
    $owner = User::factory()->create();
    $liker = User::factory()->create();
    $post = Post::factory()->create(['user_id' => $owner->id]);

    $this->actingAs($liker)->post(route('post.like', $post));
    Notification::assertSentTo($owner, LikeNotification::class);
    $this->assertDatabaseHas('likes', ['post_id' => $post->id, 'user_id' => $liker->id]);

    $this->actingAs($liker)->post(route('post.like', $post));
    $this->assertDatabaseMissing('likes', ['post_id' => $post->id, 'user_id' => $liker->id]);
});

it('follows and unfollows a user and notifies the followed user', function () {
    Notification::fake();
    $follower = User::factory()->create();
    $followed = User::factory()->create();

    $this->actingAs($follower)->post(route('user.follow', $followed));
    Notification::assertSentTo($followed, FollowNotification::class);
    $this->assertDatabaseHas('follows', ['follower_user_id' => $follower->id, 'following_user_id' => $followed->id]);

    $this->actingAs($follower)->delete(route('user.unfollow', $followed));
    $this->assertDatabaseMissing('follows', ['follower_user_id' => $follower->id, 'following_user_id' => $followed->id]);
});

it('updates the authenticated user profile', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->put(route('me.update'), [
        'name' => 'Updated Name', 'username' => 'updated-name', 'email' => $user->email,
        'bio' => 'Updated bio',
    ])->assertRedirect(route('me'));

    expect($user->refresh()->name)->toBe('Updated Name');
});

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

<?php

use App\Models\Post;
use App\Models\User;
use App\Notifications\CommentNotification;
use App\Notifications\FollowNotification;
use App\Notifications\LikeNotification;

it('uses database and mail channels for comment notifications', function () {
    expect((new CommentNotification(new User, new Post))->via(new User))->toBe(['database', 'mail']);
});

it('uses database and mail channels for like notifications', function () {
    expect((new LikeNotification(new User, new Post))->via(new User))->toBe(['database', 'mail']);
});

it('uses database and mail channels for follow notifications', function () {
    expect((new FollowNotification(new User))->via(new User))->toBe(['database', 'mail']);
});

test('example', function () {
    expect(true)->toBeTrue();
});

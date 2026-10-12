<?php

use App\Models\User;
use Illuminate\Support\Facades\Notification;

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('redirect to home after login', function () {
    $user = User::factory()->create(['password' => bcrypt('password')]);

    $response = $this->post(route('login'), [
        'email' => $user->email,
        'password' => 'password',
    ]);
    $response->assertRedirect(route('home'));

    $this->assertAuthenticatedAs($user);
});

test('signup creates a new user in the database', function () {
    Notification::fake();

    $response = $this->withSession(['signup_captcha_phrase' => 'ABCD'])
        ->post(route('signup'), [
            'name' => 'New User',
            'username' => 'new-user',
            'email' => 'new@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'captcha' => 'ABCD',
        ]);
    $response->assertRedirect(route('verification.notice'));

    $this->assertDatabaseHas('users', [
        'name' => 'New User',
        'username' => 'new-user',
        'email' => 'new@example.com',
        'email_verified_at' => null,
    ]);
});

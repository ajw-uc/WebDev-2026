<?php

use App\Models\User;

it('logs in a verified user', function () {
    $user = User::factory()->create(['email' => 'user@example.com', 'password' => bcrypt('password')]);

    $this->post(route('login'), ['email' => $user->email, 'password' => 'password'])
        ->assertRedirect(route('home'));
});

it('redirects an unverified user to email verification after login', function () {
    $user = User::factory()->unverified()->create(['password' => bcrypt('password')]);

    $this->post(route('login'), ['email' => $user->email, 'password' => 'password'])
        ->assertRedirect(route('verification.notice'));
});

it('signs up a user with a valid captcha', function () {
    $this->withSession(['signup_captcha_phrase' => 'ABCD'])
        ->post(route('signup'), [
            'name' => 'New User', 'username' => 'new-user', 'email' => 'new@example.com',
            'password' => 'password', 'password_confirmation' => 'password', 'captcha' => 'ABCD',
        ])
        ->assertRedirect(route('verification.notice'));

    $this->assertDatabaseHas('users', ['email' => 'new@example.com', 'email_verified_at' => null]);
});

it('rejects an invalid signup captcha', function () {
    $this->withSession(['signup_captcha_phrase' => 'ABCD'])
        ->from(route('signup'))
        ->post(route('signup'), [
            'name' => 'New User', 'username' => 'new-user', 'email' => 'new@example.com',
            'password' => 'password', 'password_confirmation' => 'password', 'captcha' => 'wrong',
        ])
        ->assertRedirect(route('signup'))
        ->assertSessionHasErrors('captcha');
});

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

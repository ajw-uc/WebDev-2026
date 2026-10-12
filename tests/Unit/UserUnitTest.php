<?php

use App\Models\User;

test('displays the username with an @ prefix', function () {
    $user = new User(['username' => 'johndoe']);

    expect($user->username_display)->toBe('@johndoe');
});

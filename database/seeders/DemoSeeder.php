<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(20)->create();
        Post::factory()->count(100)
            ->withComments()
            ->withLikes()
            ->create();

        $users = User::all();
        foreach ($users as $user) {
            $count = random_int(0, $users->count() - 1);
            if ($count > 0) {
                $followers = $users->where('id', '!=', $user->id)->random($count);
                foreach ($followers as $follower) {
                    $user->follow($follower);
                }
            }
        }
    }
}

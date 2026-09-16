<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();

        return [
            'content' => fake()->paragraph(),
            'user_id' => $user->id,
        ];
    }

    public function withComments(int $count = 3): static
    {
        return $this->afterCreating(function (Post $post) use ($count) {
            for ($i = 0; $i < $count; $i++) {
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => User::inRandomOrder()->first()->id,
                    'content' => fake()->sentence(),
                ]);
            }
        });
    }

    public function withLikes(int $count = 5): static
    {
        return $this->afterCreating(function (Post $post) use ($count) {
            $users = User::inRandomOrder()->take($count)->get();
            foreach ($users as $user) {
                Like::create([
                    'post_id' => $post->id,
                    'user_id' => $user->id,
                ]);
            }
        });
    }
}

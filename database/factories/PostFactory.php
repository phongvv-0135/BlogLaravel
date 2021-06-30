<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'excerpt' => $this->faker->sentence(),
            'body' => '<p>'.$this->faker->paragraph() .'</p>',
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'slug' => $this->faker->word()
        ];
    }
}

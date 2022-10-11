<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(2),
            'description' => fake()->sentence(120),
            'nationality' => fake()->country(),
            'url_img' => fake()->imageUrl(360, 360, 'animals', true, 'cats'),
            'year_created' => fake()->year( $max= "now" ),
        ];
    }
}

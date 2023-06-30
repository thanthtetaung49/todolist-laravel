<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Type\Integer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $category = ["programming", "sports", "news", "technology", "beauty"];

        return [
            "title" => $this->faker->sentence(3),
            "description" => $this->faker->text(200),
            "category" => $category[array_rand($category)],
            "rating" => rand(0,10)
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quizz>
 */
class QuizzFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quizz_name' => $this->faker->sentence(3),
            'lecturer'=>$this->faker->name(),
            'max_grade'=> $this->faker->numberBetween(8,10),
            'my_reasult' => $this->faker->numberBetween(3,8),
            'quizz_thumbnail'=>$this->faker->imageUrl(),
            'description' => $this->faker->sentence(20),
        ];
    }
}

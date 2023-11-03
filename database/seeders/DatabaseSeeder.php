<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Quizz;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Quizz::create([
            'quizz_name' => 'Quiz 1',
            'lecturer' => 'Lecturer 1',
            'status' => 1,
            'max_grade' => 100,
            'my_reasult' => 80.5,
            'quizz_thumbnail' => fake()->imageUrl(),
        ]);
        Quizz::create([
            'quizz_name' => 'Quiz 2',
            'lecturer' => 'Lecturer 2',
            'status' => 0, 
            'max_grade' => 90,
            'my_reasult' => 70.0,
            'quizz_thumbnail' => fake()->imageUrl(),
            'description' => 'This quiz is not active.',
        ]);

        Quizz::create([
            'quizz_name' => 'Quiz 3',
            'lecturer' => 'Lecturer 3',
            'status' => 1, 
            'max_grade' => 95,
            'my_reasult' => 75.5,
            'quizz_thumbnail' => fake()->imageUrl(),
        ]);


        for ($i = 4; $i <= 16; $i++) {
            Quizz::create([
                'quizz_name' => 'Quiz ' . $i,
                'lecturer' => 'Lecturer ' . $i,
                'status' => $i % 2 && $i > 9 == 0 ? 0 : 1,
                'max_grade' => 100 - $i,
                'my_reasult' => 80 - ($i * 0.5),
                'quizz_thumbnail' => $i % 2 !== 0 && $i > 9 ? fake()->imageUrl() : null,
                'description' => $i % 2 == 0 ? 'This quiz has a description.' : null,
            ]);
        }
    }
}

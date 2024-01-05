<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Quizz;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for($i=0;$i<=5;$i++){
                User::create([
                    'name'=>fake()->name(),
                    'email'=>fake()->email(),
                    'password'=>'password'
                ]);
        }
        // Quizz::factory(5)->create();
        Quizz::create([
            'quizz_name' => 'Quiz 1',
            'lecturer' => 'Lecturer 1',
            'status' => 1,
            'quizz_thumbnail' => fake()->imageUrl(),
            'user_id'=> fake()->numberBetween(1,5) 
        ]);
        Quizz::create([
            'quizz_name' => 'Quiz 2',
            'lecturer' => 'Lecturer 2',
            'status' => 0, 
            'quizz_thumbnail' => fake()->imageUrl(),
            'description' => 'This quiz is not active.',
            'user_id'=> fake()->numberBetween(1,5) 
        ]);

        Quizz::create([
            'quizz_name' => 'Quiz 3',
            'lecturer' => 'Lecturer 3',
            'status' => 1, 
            'quizz_thumbnail' => fake()->imageUrl(),
            'user_id'=> fake()->numberBetween(1,5) 
        ]);


        for ($i = 4; $i <= 16; $i++) {
            Quizz::create([
                'quizz_name' => 'Quiz ' . $i,
                'lecturer' => 'Lecturer ' . $i,
                'status' => $i % 2 && $i > 9 == 0 ? 0 : 1,
                'quizz_thumbnail' => $i % 2 !== 0 && $i > 9 ? fake()->imageUrl() : null,
                'description' => $i % 2 == 0 ? 'This quiz has a description.' : null,
                'user_id'=> fake()->numberBetween(1,5) 
            ]);
        }        
        for ($i = 0; $i <= 30; $i++) {
            Comment::create([
                'comment_author' => fake()->name(),
                'comment'=> fake()->text(),
                'quizz_id'=> fake()->numberBetween(1,16)    
            ]);
        }
        
    }
}

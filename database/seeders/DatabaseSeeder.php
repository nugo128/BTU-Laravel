<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Question;
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

        for ($i = 0; $i <= 16; $i++) {
            Quizz::create([
                'quizz_name' => 'Quiz ' . $i,
                'lecturer' => fake()->name(),
                'status' => $i % 2 == 0 ? 0 : 1,
                'quizz_thumbnail' =>fake()->imageUrl(),
                'description' => fake()->paragraph(),
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
        for ($i = 0; $i <= 100; $i++) {
            Question::create([
                'question' => fake()->sentence(),
                'thumbnail'=> fake()->imageUrl(),
                'quizz_id'=> fake()->numberBetween(1,16),
                'answer_options'  => json_encode([fake()->word(),fake()->word(),fake()->word(),fake()->word()]),
                'correct_answer'=> fake()->numberBetween(1,4),
            ]);
        }
        
    }
}

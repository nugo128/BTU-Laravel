<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(Request $request)
    {
       $question = Question::create([
                'question' => $request->question,
                'thumbnail'=>$request->file('thumbnail')->store('images'),
                'quizz_id'=> $request->id,
                'answer_options'  => json_encode([$request->answer_1,$request->answer_2,$request->answer_3,$request->answer_4]),
                'correct_answer'=> $request->correct_answer,
       ]);
       $question->save();
       return redirect('/admin');
    }
}

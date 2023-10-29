<?php

namespace App\Http\Controllers;

use App\Models\Quizz;
use Illuminate\Http\Request;

class QuizzController extends Controller
{
    public function index()
    {
        $quizz = Quizz::all();
        return view('home', compact('quizz'));
    }
}

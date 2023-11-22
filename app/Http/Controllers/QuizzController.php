<?php

namespace App\Http\Controllers;

use App\Models\Quizz;
use Illuminate\Http\Request;

class QuizzController extends Controller
{
    public function index()
    {
        $quizz = Quizz::where('status', 1)
        ->whereNotNull('quizz_thumbnail') 
        ->orderBy('created_at', 'desc') 
        ->take(8)
        ->get();

    $remainingCount = 8 - $quizz->count();

    if ($remainingCount > 0) {
        $additionalQuizzes = Quizz::where('status', 1)
            ->whereNotNull('description')
            ->whereNotIn('id', $quizz->pluck('id')->all()) 
            ->orderBy('created_at', 'desc') 
            ->take($remainingCount)
            ->get();

        $quizz = $quizz->concat($additionalQuizzes);
    }

        return view('home', compact('quizz'));
    }
    public function createOrUpdate($id) 
    {
        
        $quizCount = Quizz::count();
        if ($id <= $quizCount) {
            $quizz = Quizz::findOrFail($id);
            return view('edit-quizz',compact('quizz', 'id'));
        } else {
            $quizz = new Quizz();
            return view('create-quizz', compact('id'));
        }

    }
    public function store(Request $request){
        $quizz = Quizz::updateOrCreate(
            ['id' => $request->id],
            [
                'quizz_name' => $request['quizz_name'],
                'lecturer' => $request['lecturer'],
                'description'=>$request->description,
                'quizz_thumbnail' => $request->file('quizz_thumbnail')->store('images'),
                'max_grade' => $request['max_grade'],
                'my_reasult' => $request['my_reasult'],
            ]
        );
        $quizz->save();
        return redirect()->route('home');
    }
        
}

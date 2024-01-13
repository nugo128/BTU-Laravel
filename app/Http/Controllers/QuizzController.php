<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quizz;
use Illuminate\Http\Request;

class QuizzController extends Controller
{
    public function index()
    {
        $quizz = Quizz::with('questions')->where('status', 1)
        ->orderBy('created_at', 'desc') 
        ->get();

        return view('home', compact('quizz'));
    }
    public function adminQuizz()
    {
        $quizz = Quizz::with('comments','questions','author')->get();
        return view('admin', compact('quizz'));
    }
    public function verifyAnswer(Question $question, Request $request)
{
    $selectedOptionIndex = $request->input('selectedOptionIndex');

    if ($selectedOptionIndex + 1 == $question->correct_answer) {
        return response()->json(['message' => true]);
    } else {
        return response()->json(['message' => false]);
    }
}
    public function createOrUpdate($id) 
    {

        $quizCount = Quizz::latest()->first()->id;
        if ($id <= $quizCount) {
            $quizz = Quizz::findOrFail($id);
            $quizzUser = $quizz->author->id;
            if(auth()->id() !== $quizzUser){
                return view('error');
            }
            return view('edit-quizz',compact('quizz', 'id'));
        } else {
            $quizz = new Quizz();
            return view('create-quizz');
        }

    }
    public function viewQuizz($id)
    {
        $quizz = Quizz::with('comments','questions')->findOrFail($id);
        return view('quizz-page', compact('quizz'));
    }


    public function store(Request $request){

        if(is_numeric($request->id)){
            $quizz = Quizz::updateOrCreate(
                ['id' => $request->id],
                [
                    'quizz_name' => $request['quizz_name'],
                    'lecturer' => $request['lecturer'],
                    'description'=>$request->description,
                ]
            );
            if ($request->hasFile('quizz_thumbnail')) {
                $thumbnail = $request->file('quizz_thumbnail');
                $thumbnailPath = $thumbnail->store('images');
                $quizz->thumbnail = $thumbnailPath;
            }
        }else{
            $quizz = Quizz::updateOrCreate(
                [   
                    'user_id' => auth()->id(),
                    'quizz_name' => $request['quizz_name'],
                    'lecturer' => $request['lecturer'],
                    'description'=>$request->description,
                    'quizz_thumbnail' => $request->file('quizz_thumbnail')->store('images'),
                ]
            );
        }
        
        $quizz->save();
        return redirect()->route('home');
    }
    public function publicPost($id)
    {
        $quizz = Quizz::find($id);
        $quizz->status = 1;
        $quizz->save();
        return redirect('/admin');

    }
    public function destroy($id)
    {
        $quizz = Quizz::find($id);
        $quizz->delete();
        return redirect()->back();
    }
        
}

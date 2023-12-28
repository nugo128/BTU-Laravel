<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function addComment(Request $request)
    {
        $comment = Comment::create([
            'comment_author' => $request->comment_author,
            'quizz_id'=>$request->quizz_id,
            'comment' => $request->comment,
        ]);

        return response()->json(['message' => 'Comment added successfully', 'comment' => $comment]);
    }
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect('/admin');
    }
}

<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\QuizzController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [QuizzController::class,'index'])->name('home');
Route::get('/quizz/{quizz?}',[QuizzController::class,'createOrUpdate'])->name('quizz');
Route::get('/viewQuizz/{quizz?}',[QuizzController::class,'viewQuizz'])->name('view');
Route::post('/comments/add', [CommentController::class,'addComment'])->name('comments.add');
Route::post('/quizz/createOrUpdate', [QuizzController::class, 'store'])->name('quizz.store');
Route::get('/admin', [QuizzController::class, 'adminQuizz']);
Route::get('/admin/comment/{id?}', [CommentController::class,'destroy']);
Route::get('/admin/quizz/{id?}', [QuizzController::class,'destroy']);
Route::post('/quizzes/verify-answer/{question}', [QuizzController::class,'verifyAnswer'])->name('quizz.verify');
Route::view('/error', 'error');

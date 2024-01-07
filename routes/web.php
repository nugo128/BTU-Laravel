<?php

use App\Http\Controllers\AuthController;
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

Route::view('/error', 'error');
Route::view('/registration', 'registration');
Route::view('/login', 'login');
Route::post('/register', [AuthController::class, 'store'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/viewQuizz/{quizz?}',[QuizzController::class,'viewQuizz'])->name('view');
    Route::post('/comments/add', [CommentController::class,'addComment'])->name('comments.add');
    Route::get('/quizz/{quizz?}',[QuizzController::class,'createOrUpdate'])->name('quizz');
    Route::post('/quizz/createOrUpdate', [QuizzController::class, 'store'])->name('quizz.store');
    Route::post('/quizzes/verify-answer/{question}', [QuizzController::class,'verifyAnswer'])->name('quizz.verify');
});
Route::middleware(['super'])->group(function () {
    Route::get('/admin', [QuizzController::class, 'adminQuizz']);
    Route::get('/admin/comment/{id?}', [CommentController::class,'destroy']);
    Route::get('/admin/quizz/{id?}', [QuizzController::class,'destroy']);
    Route::get('/admin/public/{id?}',[QuizzController::class,'publicPost'])->name('quizz.public');
});

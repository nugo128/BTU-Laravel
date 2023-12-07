<?php

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
Route::post('/quizz/createOrUpdate', [QuizzController::class, 'store'])->name('quizz.store')->middleware('super');
Route::view('/error', 'error');

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [QuizController::class, 'index'])->name('quiz.index');

Route::middleware(['auth'])->group(function () {
  Route::get('/quiz/create', [QuizController::class, 'create'])->name('quiz.create');
  Route::post('/quiz', [QuizController::class, 'store'])->name('quiz.store');
  Route::get('/quiz/{question}/edit', [QuizController::class, 'edit'])->name('quiz.edit');
  Route::put('/quiz/{question}', [QuizController::class, 'update'])->name('quiz.update');
  Route::delete('/quiz/{question}', [QuizController::class, 'destroy'])->name('quiz.destroy');
});
Route::get('/quiz/{question}', [QuizController::class, 'show'])->name('quiz.show');

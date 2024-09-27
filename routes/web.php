<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth')->name('home');

    Route::resource('/user', 'App\Http\Controllers\UserController');


Route::prefix('/register-mahasiswa')->group(function () {
    Route::get('/','App\Http\Controllers\UserController@registerMahasiswaCreate')->name('register.mahasiswa');
    Route::post('/','App\Http\Controllers\UserController@registerMahasiswaStore')->name('register.mahasiswa.store');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('/category', 'App\Http\Controllers\CategoryController');

    Route::resource('/question', 'App\Http\Controllers\QuestionController');
    Route::get('/question/{id}/delete-answer','App\Http\Controllers\QuestionController@questionDelete')->name('question.answer.delete');
    Route::get('/question/{id}/check-answer','App\Http\Controllers\QuestionController@questionCheck')->name('question.answer.check');
    Route::get('/exercise/reset','App\Http\Controllers\ExerciseController@exerciseReset')->name('exercise.reset.all');
    Route::resource('/exercise', 'App\Http\Controllers\ExerciseController');
    Route::get('/preview','App\Http\Controllers\ExerciseController@preview')->name('preview');
    Route::post('/preview','App\Http\Controllers\ExerciseController@exercisePreviewCheck')->name('previewcheck');
    Route::post('/exercise/check','App\Http\Controllers\ExerciseController@exerciseCheck')->name('exercise.check');
});



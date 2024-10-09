<?php

use App\Http\Controllers\GradeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// routing untuk kelas - menggunakan resource
Route::resource('grades', GradeController::class);



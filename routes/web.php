<?php

use App\Http\Controllers\BorrowController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::match(['get', 'post'], 'register', function () {
    return redirect('login');
});

// routing untuk kelas - menggunakan resource
Route::resource('grades', GradeController::class);
Route::resource('students', StudentController::class);
Route::resource('borrow', BorrowController::class);



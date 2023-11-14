<?php

use App\Http\Controllers\Students\StudentController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/loginAutoGen', function () {
    return view('auth.loginAutoGen');
})->name('loginAutoGen');

Route::get('/student/addstudent', function () {return view('student.stdAdd');})->name('student.add')->middleware(['auth', 'verified']);

Route::post('/student/store', [App\Http\Controllers\Students\StudentController::class,'store'])-> name('students.addStudent')->middleware(['auth', 'verified']);
Route::get('/student/index',[App\Http\Controllers\Students\StudentController::class,'index'])->name('students.index')->middleware(['auth', 'verified']);
Route::get('/student/edit/{studentId}',[App\Http\Controllers\Students\StudentController::class,'edit'])->name('students.edit')->middleware(['auth', 'verified']);
Route::get('/student/profile/{studentId}',[App\Http\Controllers\Students\StudentController::class,'show'])->name('students.show')->middleware(['auth', 'verified']);
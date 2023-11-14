<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssignmentsController;

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

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');


//Asignment Route set by controller
Route::get('/assignments', [App\Http\Controllers\AssignmentsController::class, 'assignmentsform'])->name('assignments');


//Submit assignments from form
Route::post('/submissions/store', [AssignmentsController::class, 'store'])->name('post.submissions');

<?php

use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\InstituteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Assignments\AssignmentsController;
use App\Http\Controllers\Assignments\MarkingController;

//use App\Http\Controllers\AssignmentsController;
use App\Http\Controllers\ErrorController;

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



// Route::get('/dashboard', function () {
//     return view('home');
// })->middleware(['auth', 'verified'])->name('home');


//Asignment Route set by controller
Route::get('/assignments', [App\Http\Controllers\Assignments\AssignmentsController::class, 'assignmentsform'])->name('assignments');


//Submit assignments from form
Route::post('/submissions/store', [AssignmentsController::class, 'store'])->name('post.submissions');

//Submit Marks from Table
Route::post('/marks/store', [MarkingController::class, 'storemarks'])->name('mark.submit');

//Assignment marking page for tutors
Route::get('/marking', [App\Http\Controllers\Assignments\MarkingController::class, 'index'])->name('marking');

//Student CRUD operation
//Add Student
Route::get('/student/addstudent', [App\Http\Controllers\Students\StudentController::class,'add'])->name('student.add')->middleware(['auth', 'verified']);
//Student store method
Route::post('/student/store', [App\Http\Controllers\Students\StudentController::class,'store'])-> name('students.addStudent')->middleware(['auth', 'verified']);
//All students
Route::get('/student/index',[App\Http\Controllers\Students\StudentController::class,'index'])->name('students.index')->middleware(['auth', 'verified']);
//Edit student details
Route::get('/student/edit/{studentId}',[App\Http\Controllers\Students\StudentController::class,'edit'])->name('students.edit')->middleware(['auth', 'verified']);
//Student update 
Route::get('/student/update/{studentId}',[App\Http\Controllers\Students\StudentController::class,'update'])->name('students.update')->middleware(['auth', 'verified']);
//Student Profile
Route::get('/student/profile/{studentId}',[App\Http\Controllers\Students\StudentController::class,'show'])->name('students.show')->middleware(['auth', 'verified']);

//end of routes


//Insttiute CRUD
//Add Institiu
Route::get('/institute/addinstitute', function () {return view('institute.instAdd');})->name('institute.add')->middleware(['auth', 'verified']);
//Student store method
Route::post('/institute/store', [App\Http\Controllers\InstituteController::class,'store'])-> name('institute.addinstitute')->middleware(['auth', 'verified']);
//All students
Route::get('/institute/index',[App\Http\Controllers\InstituteController::class,'index'])->name('institute.index')->middleware(['auth', 'verified']);
//Edit student details
Route::get('/institute/edit/{studentId}',[App\Http\Controllers\Students\StudentController::class,'edit'])->name('institute.edit')->middleware(['auth', 'verified']);
//Student update 
Route::get('/institute/update/{studentId}',[App\Http\Controllers\Students\StudentController::class,'update'])->name('students.update')->middleware(['auth', 'verified']);
//Student Profile
Route::get('/institute/profile/{studentId}',[App\Http\Controllers\Students\StudentController::class,'show'])->name('students.show')->middleware(['auth', 'verified']);


Route::get('/error',[App\Http\Controllers\ErrorController::class,'error'])->name('error')->middleware(['auth', 'verified']);

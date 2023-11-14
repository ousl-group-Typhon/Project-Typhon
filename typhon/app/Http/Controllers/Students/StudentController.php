<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function store(Request $request){
        Student::create([
            'student_fname' => $request->fName,
            'student_lname' => $request->lName,
            'email' => $request->email,
            'phone_number' => $request->phoneNumber,
            'guardians_pnumber' => $request->guardiansPnumber,      
        ]);

        return redirect(route('student.show'))->with('status','Profile created!');
    }

    public function index(){
        $students = Student::all();
        return view('student.stdList',compact('students'));
    }

    public function show($studentId){
        return view('student.stdProfile');
    }

    public function edit($studentId){
        $student = Student::findOrFial($studentId);
        return view('student.stdEdit',compact('student'));
    }
    
    public function update($studentId, Request $request){
        Student::findOrFail($studentId)->update($request->all());
        return redirect(route('student.stdList'));
    }
}

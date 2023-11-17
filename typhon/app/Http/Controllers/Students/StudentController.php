<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function add () {
        
        return view('student.stdAdd');
    }

    public function store(Request $request){
        Student::create([
            'student_fname' => $request->fName,
            'student_lname' => $request->lName,
            'email' => $request->email,
            'phone_number' => $request->phoneNumber,
            'guardians_pnumber' => $request->guardiansPnumber,      
        ]);

        return redirect(route('marking'))->with('status','Marks Added!');
    }

    public function index(){
        $students = Student::all();
        return view('student.stdList',compact('students'));
    }

    public function show($studentId){
        return view('student.stdProfile');
    }

    public function edit($studentId){
        $student = Student::findOrFail($studentId);
        return view('student.stdEdit',compact('student'));
    }
    
    public function update($studentId, Request $request){
        $student = Student::findOrFail($studentId);
        
        $student->student_fname = $request->input('fName');
        $student->student_lname = $request->input('lName');
        $student->email = $request->input('email');
        $student->phone_number = $request->input('phoneNumber');
        $student->guardians_pnumber = $request->input('guardiansPnumber');
        $student->update();

        return redirect(route('students.index'))->with('status','Profile update!');
    }
}

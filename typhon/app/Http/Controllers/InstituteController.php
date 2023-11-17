<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use Illuminate\Http\Request;

class InstituteController extends Controller
{
    public function add() {
        return view('institute.instAdd');
    }

    public function store(Request $request){
        
      
            Institute::create([
                'institiute_name' => $request->instName,
                //   'institiute_address' => $request->instAddress,
                'owner' => $request->owner,
                // 'phone_number' => $request->phoneNumber,    
            ]);
    
            return redirect(route('institute.index'))->with('status','Profile created!');
       
    }

    public function index(){
        $institutes = Institute::all();
        return view('institute.instList',compact('institutes'));
    }

    public function show($studentId){
        return view('institute.instProfile');
    }

    public function edit($studentId){
        $student = Institute::findOrFail($studentId);
        return view('institute.instEdit',compact('student'));
    }
    
    public function update($studentId, Request $request){
        $student = Institute::findOrFail($studentId);
        
        $student->student_fname = $request->input('fName');
        $student->student_lname = $request->input('lName');
        $student->email = $request->input('email');
        $student->phone_number = $request->input('phoneNumber');
        $student->guardians_pnumber = $request->input('guardiansPnumber');
        $student->update();

        return redirect(route('students.index'))->with('status','Profile update!');
    }
}
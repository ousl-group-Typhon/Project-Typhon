<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AuthUserController;
use DB;

class InstituteController extends Controller
{
    public function getUserId(){
        $userId = Auth::user()->id;
        return $userId;
    }

    public function getUserType(){
        $userType = Auth::user()->user_type;
        return $userType;
    }


    public function add() {
        return view('institute.instAdd');
    }

    public function store(Request $request){
        
      
            Institute::create([
                'institute_name' => $request->instName,
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

    //custom functions 
    //show classes in institiute
    public function showInstituteClasses(){
        // $user = Auth::user()->id;
        $user = getUserId();
        $institute = DB::table('institutes')->where('owner', $user)->first();
        $tclass = DB::table('t_classes')
        ->join('users as user','t_classes.tutor_id', '=', 'user.id')
        ->where('institute_id',$institute->id)
        ->select('user.name as user_name','t_classes.*')->get();
        return view('tClasses.clsList',compact('tclass'));
    }

    //show students in institute
    public function showInstituteStudents(){
        //$user = Auth::user()->id;
        $user = getUserId();
        $institute = DB::table('institutes')->where('owner', $user)->first();

        $students= DB::table('students')
        ->join('stdbelongstocls', 'students.id', '=', 'stdbelongstocls.student_id')
        ->join('t_classes', 'stdbelongstocls.class_id', '=', 't_classes.id')
        ->where('t_classes.institute_id', '=', $institute->id)
        ->select('students.*')
        ->distinct()
        ->get();

        return view('student.stdList',compact('students'));
    }

    public function showInstitutesWithClasses(){
        $userId = Auth::user()->id;
        //$userId = getUserId();
        $institutes = DB::table('t_classes')->join('institutes', 't_classes.institute_id', '=' , 'institutes.id')->where('t_classes.tutor_id', '=', $userId)->select('institutes.*')->get();
        
        return view('institute.instList',compact('institutes'));
    }
}

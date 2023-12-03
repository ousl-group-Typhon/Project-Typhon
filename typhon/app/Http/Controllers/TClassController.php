<?php

namespace App\Http\Controllers;
use App\Models\TClass;
use App\Models\User;
use App\Models\Institute;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Http\Request;

class TClassController extends Controller
{

    public function addStudentToClass($classId){
        //add a student in the institute
    }
    public function addNewStudentToClass($classId){
        //add a student not in the institute
    }
    public function showClassesAndStudents()
    {
        // Retrieve the currently authenticated user
        $user = Auth::user();
    
        // Retrieve the classes and students related to the user's institute
        $tclass = $user->institute->t_classes;
        //$instituteStudents = $user->institute->students;
    
    
        return view('tClasses.clsList',compact('tclass'));
    }

    public function addClass(){
        return view('tClasses.clsAdd');
    }
    public function store(Request $request){
        $user = Auth::user()->id;
        $instituteID = DB::table('institutes')->where('owner', $user)->first();
        if ($instituteID != null) {
            TClass::create([
                'class_name' => $request->clsName,
                'tutor_id' => $request->tutorID,
                'institute_id'=> $instituteID->id,
                'amount' => $request->classFee,      
            ]);
            return redirect(route('class.show'))->with('status','Profile created!');
        } else {
            return redirect(route('error'));
        }
        
        

       
    }

    public function update($classId, Request $request){
        
        $class = TClass::findOrFail($classId);
        $class->class_name = $request->input('clsName');
        $class->tutor_id = $request->input('tutorID');
        $class->amount = $request->input('classFee');
        $class->update();

        return redirect(route('students.index'))->with('status','Profile update!');
    }
    public function index(){
        //$tclass = TClass::all();
        $user = Auth::user();
        // foreach ($ as $key => $value) {
        //     # code...
        // }
        $tclass = TClass::join('institutes','institutes.id','=','institute_id')->get();
        //htmlspecialchars($tclass);
        return view('tClasses.clsList',compact('tclass'));
    }

    // show students who belongs to a class
    public function showStudentsInClass($classId){
        $students = DB::table('stdbelongstocls')
        ->join('students', 'stdbelongstocls.student_id', '=', 'students.id')
        ->where('stdbelongstocls.class_id', '=', $classId)
        ->select('students.id','students.student_fname','students.student_lname','students.acc_status')
        ->get();
    
        return view('student.stdList',compact('students'));
    }
}

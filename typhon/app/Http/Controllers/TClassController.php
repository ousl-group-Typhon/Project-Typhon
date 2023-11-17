<?php

namespace App\Http\Controllers;
use App\Models\TClass;
use Illuminate\Http\Request;

class TClassController extends Controller
{
    public function store(Request $request){
        TClass::create([
            'class_name' => $request->className,
            'tutor_id' => $request->tutorId,
            'institute_id'=> $request->instituteId,
            'amount' => $request->amount,      
        ]);

        return redirect(route('student.show'))->with('status','Profile created!');
    }

    public function index(){
        $tclass = TClass::all();
        $data = TClass::join('institutes','institutes.id','=','institute_id');
        return view('tClass.clsList',compact('tclass'));
    }

    public function showStudentsInClass($classId)
    {
    $class = ClassModel::with('students')->find($classId);

    return view('tTlasses.clsProfile', compact('class'));
    }
}

<?php

namespace App\Http\Controllers\Assignments;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\assignmentssubmission;
use App\Models\marks;



class MarkingController extends Controller
{
    public function index(){

        $submissions = assignmentssubmission::all();
        
        return view('assignments.assignmentmarking', compact('submissions'));

    }

    public function storemarks(Request $request){
      


        $request->validate([
            'assignment_id' => 'required',
            'student_id' => 'required',
            'marks' => 'required|numeric',
        ]);
    
        $result = marks::updateOrInsert(
            [
                'assignment_id' => $request->assignment_id,
                'student_id' => $request->student_id,
            ],
            [
                'marks' => $request->marks,
            ]
        );
    
        if ($result) {
            return redirect()->back()->with('success', 'Marks updated successfully');
        } else {
            return redirect()->back()->with('error', 'Invalid marks or failed to update');
        }

    }
}

<?php

namespace App\Http\Controllers\Assignments;

use Illuminate\Http\Request;
use App\Models\assignmentssubmission;
use App\Http\Controllers\Controller;

class AssignmentsController extends Controller
{

    //link page of assignment submission form to
    public function assignmentsform()
    {
        return view('assignments.assignmentssubmit');
    }

    //Store data into the database from the submission form
    public function store(Request $request)
    {
    try {
        $user_id = auth()->user()->id;

        $data = [
            'user_id' => $user_id,
            'student_id' => $request->student_id,
            'cource_id' => $request->cource_id,
        ];

        if ($request->hasFile('submission')) {
            $file = $request->file('submission');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/submissions/', $filename);
            $data['submission'] = $filename;

            assignmentssubmission::create($data);

            return 'Data stored successfully!';
        } else {
            return 'No file uploaded!';          
        }
    } catch (\Exception $e) {
        return $e->getMessage();
    }
}
}

//end
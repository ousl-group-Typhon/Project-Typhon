<?php

namespace App\Http\Controllers\Assignments;

use Illuminate\Http\Request;
use App\Models\assignmentssubmission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AssignmentsController extends Controller{

    //link page of assignment submission form to
    public function assignmentsform()
    {
        return view('assignments.assignmentssubmit');
    }

    //Store data into the database from the submission form
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'student_id' => [
                'required',
                Rule::exists('students', 'id'), // Validate that the student ID exists in the 'students' table
            ],
            'cource_id' => 'required',
            'submission' => 'required|file|mimes:pdf,doc,docx',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'student_id' => $request->student_id,
            'cource_id' => $request->cource_id,
        ];

        if ($request->hasFile('submission')) {
            $file = $request->file('submission');

            // Validate file type and extension
            $validator = Validator::make(['submission' => $file], [
                'submission' => 'file|mimes:pdf,doc,docx',
            ]);

            // If file validation fails, redirect back with errors
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/submissions/', $filename);
            $data['submission'] = $filename;

            // Save data to the database
            assignmentssubmission::create($data);

            // Redirect back with success message
            return redirect()->back()->with('success', 'Data stored successfully!');
        } else {
            // Redirect back with an error message
            return redirect()->back()->with('error', 'No file uploaded!');
        }
    }


}

//end
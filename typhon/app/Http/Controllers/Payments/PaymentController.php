<?php

namespace App\Http\Controllers\Payments;

use Illuminate\Http\Request;
use App\Models\Payments;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class PaymentController extends Controller
{
    //link page of payment
    public function index()
    {   
        $Payments = Payments::all();
        return view('Payments.payments', compact('Payments'));
    }

    //store Payments
    public function store(Request $request){

        // Find an existing payment record for the specified student_id
        $existingPayment = Payments::where('student_id', $request->student_id)->first();

        // Calculate the end of the month for the due date
        $dueDate = Carbon::now()->endOfMonth();

        // If an existing payment record is found, update it; otherwise, create a new one
        if ($existingPayment) {
            $existingPayment->amount = $request->amount; // Update the amount
            $existingPayment->due_date = $dueDate; // Update the due date
            $existingPayment->status = 'Paid'; // Set the status to 'active'
            $status = $existingPayment->save(); // Save the changes
        } else {
            $status = Payments::create([
                'student_id' => $request->student_id,
                'amount' => $request->amount,
                'due_date' => $dueDate,
                'status' => 'Paid', // Set the status to 'active'
            ]);
        }

        if ($status) {
            return redirect()->back()->with('success', 'Payment Recorded Successfully');
        } else {
            return redirect()->back()->with('error', 'Failed To Record Payment');
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'amount',
        'status',
        'classid',
        'due_date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::updated(function ($payment) {
            // Check if the 'amount' column has been updated with a value greater than 0
            if ($payment->isDirty('amount') && $payment->amount > 0) {
                // Make sure to use the correct namespace for the allPayments model
                \App\Models\allPayments::create([
                    'paymentID' => $payment->id,
                    'student_id' => $payment->student_id,
                    'classid' => $payment->classid,
                    'amount' => $payment->amount,
                ]);
            }
        });
    }
}

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
        'due_date',
    ];

    protected static function boot()
    {
    parent::boot();

    static::updated(function ($payment) {
        allPayments::create([
            'paymentID' => $payment->id,
            'student_id' => $payment->student_id,
            'amount' => $payment->amount,
        ]);
    });
    }
}

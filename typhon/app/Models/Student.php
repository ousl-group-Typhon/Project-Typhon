<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_fname',
        'student_lname',
        'email',
        'phone_number',
        'guardians_pnumber',
        'acc_status'
    ];
}

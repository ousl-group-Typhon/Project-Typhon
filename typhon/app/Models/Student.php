<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function institute()
    {
        return $this->belongsTo(Institute::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class);
    }
    protected $fillable = [
        'student_fname',
        'student_lname',
        'email',
        'phone_number',
        'guardians_pnumber',
        'acc_status'
    ];
}

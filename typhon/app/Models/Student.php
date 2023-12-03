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

    protected static function boot()
    {
        parent::boot();

        // Listen for the 'created' event and create a corresponding payment record
        static::created(function ($student) {

            Payments::create([
                'student_id' => $student->id,
                'amount' => 0, // Initial amount, you can adjust this as needed
                'classid' => 0000, 
                'due_date' => now()->endOfMonth(), // Due date at the end of the current month
                'status' => 'due',
            ]);
        });
    }
}

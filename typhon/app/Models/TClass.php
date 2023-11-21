<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TClass extends Model
{
    use HasFactory;
    
    public function institute()
    {
        return $this->belongsTo(Institute::class);
    }
    protected $fillable = [
        'class_name',
        'tutor_id',
        'institute_id',
        'amount',
    ];
}

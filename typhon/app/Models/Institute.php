<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    use HasFactory;
    public function classes()
    {
        return $this->hasMany(TClass::class);
    }
    public function students()
    {
        return $this->hasManyThrough(Student::class, TClass::class);
    }
    protected $fillable = [
        'institute_name',
       // 'institiute_address',
        'owner',
        //'phone_number'

    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institiute extends Model
{
    use HasFactory;

    protected $fillable = [
        'institiute_name',
        'owner'
    ];
}

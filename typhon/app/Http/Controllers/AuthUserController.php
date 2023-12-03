<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthUserController extends Controller
{
    public function getUserId(){
        $userId = Auth::user()->id;
        return $userId;
    }

    public function getUserType(){
        $userType = Auth::user()->user_type;
        return $userType;
    }
}

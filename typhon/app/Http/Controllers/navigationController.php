<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class navigationController extends Controller
{
    public function Navigation()
    {
        return view('navigation');
    }
}

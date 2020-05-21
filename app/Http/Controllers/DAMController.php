<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DAMController extends Controller
{
     public function index()
    {
        return view('dam');
    }
}

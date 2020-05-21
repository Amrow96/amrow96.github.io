<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DAWController extends Controller
{
     public function index()
    {
        return view('daw');
    }
}

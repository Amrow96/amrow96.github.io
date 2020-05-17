<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SelectorController extends Controller
{
   
    public function selector(){
        return view('selector');
    }
}

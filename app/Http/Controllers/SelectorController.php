<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SelectorController extends Controller
{
   
    public function selector(){
        return view('selector');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TextosController extends Controller
{
    public function showTextos(){
        return view('textos');
    }
}

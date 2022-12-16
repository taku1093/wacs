<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contactController extends Controller
{
    //indexメソッド
    public function index()
    {
        return view('contact');
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class top_testController extends Controller
{
    //indexメソッド
    public function index()
    {
        return view('top_test');
    }
}

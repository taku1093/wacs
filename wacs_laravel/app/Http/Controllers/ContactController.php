<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //indexメソッド
    public function index(User $user)
    {
        $all_users = $user;
        return view('contact',[
            'user'  => $all_users
        ]);
    }
}


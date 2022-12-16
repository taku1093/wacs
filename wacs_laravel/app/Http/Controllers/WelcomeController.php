<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    //indexメソッド
    public function index(User $user)
    {
        $all_users = $user;
        return view('welcome', [
            'user'  => $all_users
        ]);
    }
}

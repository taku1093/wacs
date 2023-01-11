<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class Register_confController extends Controller
{
    //
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest');
    }

    // public function index()
    // {
    //     $user_name = $_POST["user_name"];
    //     return view('auth\register_conf');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // 入力データの取得
    protected function validator(array $data)
    {
        return view('auth.register_conf');
    }
}

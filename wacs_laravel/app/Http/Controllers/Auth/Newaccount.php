<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // 入力データの取得
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'screen_name' => ['required', 'string', 'max:255', 'unique:users'],
            'user_screen_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

            'user_tell' => ['required', 'string'],
            // 'user_sur' => ['required', 'string', 'max:255'],
            // 'user_name'=> ['required', 'string', 'max:255'],
            // 'user_sur_kana' => ['required', 'string', 'max:255'],
            // 'user_name_kana' => ['required', 'string', 'max:255'],
            'user_name' => ['required', 'string', 'max:255'],
            'user_name_kana' => ['required', 'string', 'max:255'],
            'user_gen' => ['required', 'string', 'max:255']
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // 受信データの書き込み
    protected function create(array $data)
    {
        return User::create([
            // 'screen_name' => $data['screen_name'],
            'user_screen_name' => $data['user_screen_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

            'user_tell' => $data['user_tell'],
            // 'user_sur' => $data['user_sur'],
            // 'user_name' => $data['user_name'],
            // 'user_sur_kana' => $data['user_sur_kana'],
            // 'user_name_kana' => $data['user_name_kana'],
            'user_name' => $data['user_name'],
            'user_name_kana' => $data['user_name_kana'],
            'user_gen' => $data['user_gen']
        ]);
    }
}

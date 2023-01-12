<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
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

    // ルート
    private $form_show = 'Auth\RegisterController@showRegistrationForm';
    private $form_confirm = 'Auth\RegisterController@confirm';

    // 入力データ
    private $formItems = [
        "user_name",
        "user_name_kana", 
        "user_screen_name",
        "user_gen",
        "year",
        "month",
        "date",
        "user_pre",
        "user_city",
        "user_tell",
        "email", 
        "password",
        "password_confirmation"
    ];



    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

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
            
            'user_name' => ['required', 'string', 'max:10'],
            'user_name_kana' => ['required', 'string', 'max:20'],
            'user_screen_name' => ['required', 'string', 'max:30'],
            'user_gen' => ['required', 'string', 'max:255'],
            'year' => ['required', 'string', 'max:255'],
            'month' => ['required', 'string', 'max:255'],
            'date' => ['required', 'string', 'max:255'],
            'user_pre' => ['required', 'string', 'max:255'],
            'user_city' => ['required', 'string', 'max:255'],
            'user_tell' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:8','max:16', 'confirmed'],
            
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
            
            'user_name' => $data['user_name'],
            'user_name_kana' => $data['user_name_kana'],
            'user_screen_name' => $data['user_screen_name'],
            'user_gen' => $data['user_gen'],
            'year' => $data['year'],
            'month' => $data['month'],
            'date' => $data['date'],
            'user_pre' => $data['user_pre'],
            'user_city' => $data['user_city'],
            'user_tell' => $data['user_tell'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /*
     * 入力から確認へ遷移する際の処理
     */
    function post(Request $request)
    {
        $this->validator($request->all())->validate();

        $input = $request->only($this->formItems);

        //セッションに書き込む
        $request->session()->put("form_input", $input);

        return redirect()->action($this->form_confirm);
    }


    /**
     * 登録処理
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        //セッションから値を取り出す
        $input = $request->session()->get("form_input");

        // 戻るボタン
        if ($request->has("back")) {
            return redirect()->action($this->form_show)
                ->withInput($input);
        }

        //セッションに値が無い時はフォームに戻る
        if (!$input) {
            return redirect()->action($this->form_show);
        }

        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //セッションを空にする
        $request->session()->forget("form_input");

        // 登録データーでログイン
        $this->guard()->login($user, true);

        return $this->registered($request, $user)
            ?  : redirect($this->redirectPath());
    }

    // /**
    //  * 会員登録入力フォーム出力
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function showRegistrationForm()
    // {
    //     return view('auth.register.register');
    // }

    /*
     * 確認画面出力
     */
    public function confirm(Request $request)
    {
        //セッションから値を取り出す
        $input = $request->session()->get("form_input");

        //セッションに値が無い時はフォームに戻る
        if (!$input) {
            return redirect()->action("Auth\RegisterController");
        }

        return view('auth.register_conf', ["input" => $input]);
    }
    
    protected function registered(Request $request, $user)
    {
        //
    }

    // 利用規約
    public function terms()
    {
        // $all_users = $user;
        return view('auth.newaccount_terms', [
            // 'user'  => $all_users
        ]);
    }
}

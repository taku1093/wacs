<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // fillable:登録・更新の許可、複数代入の対策されているため
    protected $fillable = [
        // 'screen_name',
        'user_screen_name',
        'user_icon',
        'email',
        'repass',
        'user_tell',
        'user_name',
        'user_name_kana',
        'user_gen',
        'year',
        'month',
        'date',
        'user_pre', 
        'user_city',
        'password',
        'user_intro'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // 非取得設定
    protected $hidden = [
        // 'user_psw',
        'password' ,
        'remember_token',//ログイン状態の保持
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // データ型変換
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // リレーションの親子関係設定（親：user、子：follow）
    // リレーション：テーブルの関連づけ
    // この関数を呼び出すことで各テーブルの情報を取得
    public function followers()
    {
        return $this->belongsToMany(self::class, 'followers', 'followed_id', 'following_id');
    }

    public function follows()
    {
        return $this->belongsToMany(self::class, 'followers', 'following_id', 'followed_id');
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function post_goods()
    {
        return $this->hasMany(Post_good::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function getAllUsers(Int $user_id)
    {
        // フォローされているユーザ情報を取得
        return $this->Where('id', '<>', $user_id)->paginate(5);//現在は1ページに五名フォローユーザを表示
    }

        // フォローする
    public function follow(Int $user_id) 
    {
        return $this->follows()->attach($user_id);
    }

    // フォロー解除する
    public function unfollow(Int $user_id)
    {
        return $this->follows()->detach($user_id);
    }

    // フォローしているか
    public function isFollowing(Int $user_id) 
    {
        return (boolean) $this->follows()->where('followed_id', $user_id)->first();
    }

    // フォローされているか
    public function isFollowed(Int $user_id) 
    {
        return (boolean) $this->followers()->where('following_id', $user_id)->first();
    }

    // いいねしているか
    public function isGood(Int $user_id) 
    {
        return (boolean) $this->post_goods()->where('user_id', $user_id)->get();
    }

    // フォローユーザ情報取得
    public function getUserInfo(Int $user_id, Array $following_ids){
        // $following_ids[] = $user_id;
        return $this->whereIn('id', $following_ids)->orderBy('created_at', 'DESC')->get();
    } 

    // マイページ編集
    public function updateProfile(Array $params)
    {
        if (isset($params['user_icon'])) {
            $file_name = $params['user_icon']->store('public/user_icon/');

            $this::where('id', $this->id)
                ->update([
                    'user_icon' => basename($file_name),
                    'user_name' => $params['user_name'],
                    'user_name_kana' => $params['user_name_kana'],
                    'user_screen_name' => $params['user_screen_name'],
                    // 'user_gen' => $params['user_gen'],
                    'year' => $params['year'],
                    'month' => $params['month'],
                    'date' => $params['date'],
                    'user_pre' => $params['user_pre'],
                    'user_city' => $params['user_city'],
                    'user_tell' => $params['user_tell'],
                    'email' => $params['email'],
                    'user_intro' => $params['user_intro']
                ]);

                if (isset($params['user_gen'])) {
                    $this::where('id', $this->id)
                    ->update([
                        'user_gen' => $params['user_gen'],
                    ]);
                }

        } else {
            $this::where('id', $this->id)
                ->update([
                    'user_name' => $params['user_name'],
                    'user_name_kana' => $params['user_name_kana'],
                    'user_screen_name' => $params['user_screen_name'],
                    // 'user_gen' => $params['user_gen'],
                    'year' => $params['year'],
                    'month' => $params['month'],
                    'date' => $params['date'],
                    'user_pre' => $params['user_pre'],
                    'user_city' => $params['user_city'],
                    'user_tell' => $params['user_tell'],
                    'email' => $params['email'],
                    'user_intro' => $params['user_intro']
                ]); 

                if (isset($params['user_gen'])) {
                    $this::where('id', $this->id)
                    ->update([
                        'user_gen' => $params['user_gen'],
                    ]);
                }
        }

        return;
    }

    public function userDestroy(Int $user_id)
    {
        return $this->where('id', $user_id)->delete();
    }
}

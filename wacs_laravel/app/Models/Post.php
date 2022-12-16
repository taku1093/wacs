<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Post extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'post_exp',
        'post_img'
    ];

    // リレーションの親子関係設定（親：user、子：follow）
    // リレーション：テーブルの関連づけ
    // この関数を呼び出すことで各テーブルの情報を取得

    // 多対一
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 一対多
    public function favorites()
    {
        return $this->hasMany(Post_good::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getUserTimeLine(Int $user_id)
    {
        return $this->where('user_id', $user_id)->orderBy('created_at', 'DESC')->paginate(50);
    }

    public function getPostCount(Int $user_id)
    {
        return $this->where('user_id', $user_id)->count();
    }

        // 一覧画面
    public function getTimeLines(Int $user_id, Array $follow_ids)
    {
        // 自身とフォローしているユーザIDを結合する
        $follow_ids[] = $user_id;
        return $this->whereIn('user_id', $follow_ids)->orderBy('created_at', 'DESC')->paginate(50);
    }

    public function postStore(Int $user_id, Array $data)
    {
        $this->user_id = $user_id;
        $this->post_exp = $data['post_exp'];
        // 投稿画像（baename:パス名除去）
        $this->post_img = basename($data['post_img']->store('public/post_img/'));

        $this->save();

        return;
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post_good extends Model
{
    //デフォルトのタイムスタンプ設定をオフ
    public $timestamps = false;

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // いいねユーザ取得
    public function goodIds(Int $user_id)
    {
        return $this->where('user_id', $user_id)->get();
    }

     // いいねしているかどうかの判定処理
    public function isPost_good(Int $user_id, Int $post_id) 
    {
        return (boolean) $this->where('user_id', $user_id)->where('post_id', $post_id)->first();
    }

    public function storePost_good(Int $user_id, Int $post_id)
    {
        $this->user_id = $user_id;
        $this->post_id = $post_id;
        $this->save();

        return;
    }

    public function destroyPost_good(Int $good_id)
    {
        return $this->where('id', $good_id)->delete();
    }

}

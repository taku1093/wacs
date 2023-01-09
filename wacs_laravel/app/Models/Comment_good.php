<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment_good extends Model
{
    //
    public $timestamps = false;

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    // いいねしているかどうかの判定処理
    public function isComment_good(Int $user_id, Int $comment_id) 
    {
        return (boolean) $this->where('user_id', $user_id)->where('comment_id', $comment_id)->first();
    }

    public function storeComment_good(Int $user_id, Int $comment_id)
    {
        $this->user_id = $user_id;
        $this->comment_id = $comment_id;
        $this->save();

        return;
    }

    public function destroyComment_good(Int $comment_good_id)
    {
        return $this->where('id', $comment_good_id)->delete();
    }
}

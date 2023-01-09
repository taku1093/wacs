<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply_good extends Model
{
    //
    public $timestamps = false;

    public function reply()
    {
        return $this->belongsTo(Reply::class);
    }

    // いいねしているかどうかの判定処理
    public function isReply_good(Int $user_id, Int $reply_id) 
    {
        return (boolean) $this->where('user_id', $user_id)->where('reply_id', $reply_id)->first();
    }

    public function storeReply_good(Int $user_id, Int $reply_id)
    {
        $this->user_id = $user_id;
        $this->reply_id = $reply_id;
        $this->save();

        return;
    }

    public function destroyReply_good(Int $reply_good_id)
    {
        return $this->where('id', $reply_good_id)->delete();
    }
}

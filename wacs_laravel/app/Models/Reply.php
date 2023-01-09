<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Reply extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'reply_text'
    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function reply_goods()
    {
        return $this->hasMany(Reply_good::class);
    }

    public function getReplies(Int $comment_id)
    {
        return $this->with('comment')->where('comment_id', $comment_id)->get();
    }

    public function replyStore(Int $user_id, Array $data)
    {
        $this->user_id = $user_id;
        $this->comment_id = $data['comment_id'];
        $this->reply_text = $data['reply_text'];
        $this->save();

        return;
    }
}

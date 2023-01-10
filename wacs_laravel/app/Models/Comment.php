<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;


class Comment extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'comment_text'
    ];

    // リレーションの親子関係設定（親：user、子：follow）
    // リレーション：テーブルの関連づけ
    // この関数を呼び出すことで各テーブルの情報を取得

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment_goods()
    {
        return $this->hasMany(Comment_good::class);
    }

    

    public function getComments(Int $post_id)
    {
        return $this->with('user')->where('post_id', $post_id)->get();
    }

    public function getshowComments(Int $comment_id)
        {
            return $this->with('user')->where('id', $comment_id)->first();
        }
    
    public function commentStore(Int $user_id, Array $data)
    {
        $this->user_id = $user_id;
        $this->post_id = $data['post_id'];
        $this->comment_text = $data['comment_text'];
        $this->save();

        return;
    }
}

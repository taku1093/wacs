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
}

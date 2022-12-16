<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    // Pキー設定
    protected $primaryKey = [
        'following_id',
        'followed_id'
    ];
    protected $fillable = [
        'following_id',
        'followed_id'
    ];
    //タイムスタンプ・インクリメントのオフ
    public $timestamps = false;
    public $incrementing = false;
}



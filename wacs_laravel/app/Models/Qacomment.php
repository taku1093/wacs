<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qacomment extends Model
{
    // 割り当て許可
    protected $fillable = [
        'qapost_id',
           'name',
           'qacomment', 
    ];

    public function qapost(){
    
        // コメントは1つの投稿に所属する
        return $this->belongsTo('App\Models\Qapost');
    }
}

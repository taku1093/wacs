<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qacategory extends Model
{
    //
    public function qaposts() {
        // カテゴリは複数のポストを持つ
        return $this->hasMany('App\Models\Qapost');
    }

    // public function qapost() {
    //     // カテゴリは複数のポストを持つ
    //     return $this->belongsTo('App\Qapost');
    // }

    /**
     * カテゴリーの一覧を取得
     */
    public function getLists()
    {
        $qacategories = Qacategory::orderBy('id','asc')->pluck('name', 'id');
    
        return $qacategories;
    }
}

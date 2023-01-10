<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Qapost extends Model
{
    // 割り当て許可
    protected $fillable = [
        'name',
        'subject',
        'message', 
        'qacategory_id'
    ];
    
    public function qacomments() {
        //投稿は複数のコメントを持つ
        return $this->hasMany('App\Models\Qacomment');
    }

    public function qacategory() {
        //投稿は1つのカテゴリーに属する
        return $this->belongsTo('App\Models\Qacategory');
    }
    
    // public function qacategories() {
        
    //     return $this->hasMany('App\Qacategory');
    // }

    /**
     * 任意のカテゴリを含むものとする（ローカル）スコープ
     * 
     */
    public function scopeCategoryAt($query, $qacategory_id)
    {
        if (empty($qacategory_id)) {
            return;
        }
    
        return $query->where('qacategory_id', $qacategory_id);
    }
    
    /**
     * 「名前」検索スコープ
     */
    public function scopeFuzzyName($query, $searchword)
    {
        if (empty($searchword)) {
            return;
        }
        return $query->where('name', 'like', "%{$searchword}%");
    }

    /**
     * 「名前・本文」検索スコープ
     */
    public function scopeFuzzyNameMessage($query, $searchword)
    {
        if (empty($searchword)) {
            return;
        }
    
        return $query->where(function ($query) use($searchword) {
            $query->orWhere('name', 'like', "%{$searchword}%")
                ->orWhere('message', 'like', "%{$searchword}%");
        });
    }
}

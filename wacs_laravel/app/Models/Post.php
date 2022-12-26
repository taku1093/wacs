<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use phpDocumentor\Reflection\Types\String_;

class Post extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'post_title',
        'post_img1',
        'post_img2',
        'post_img3',
        'post_exp',
        'method',
        'material',
        'tool',
        'post_tag'
    ];

    // リレーションの親子関係設定（親：user、子：follow）
    // リレーション：テーブルの関連づけ
    // この関数を呼び出すことで各テーブルの情報を取得

    // 多対一
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 一対多
    public function favorites()
    {
        return $this->hasMany(Post_good::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function materials()
    {
        // return $this->hasMany('app\Models\Material');
        return $this->hasMany(Material::class);
    }


    public function getUserTimeLine(Int $user_id)
    {
        return $this->where('user_id', $user_id)->orderBy('created_at', 'DESC')->paginate(50);
    }

    public function getPostCount(Int $user_id)
    {
        return $this->where('user_id', $user_id)->count();
    }

        // 一覧画面
    public function getTimeLines(Int $user_id, Array $follow_ids)
    {
        // 自身とフォローしているユーザIDを結合する
        $follow_ids[] = $user_id;
        return $this->whereIn('user_id', $follow_ids)->orderBy('created_at', 'DESC')->paginate(50);
    }

    public function postStore(Int $user_id, Array $data, Request $request)
    {
        $this->user_id = $user_id;

        $this->post_title = $data['post_title'];
         // 投稿画像（baename:パス名除去）
        if($request->has("post_img3")){
            $this->post_img1 = basename($data['post_img1']->store('public/post_img/'));
            $this->post_img2 = basename($data['post_img2']->store('public/post_img/'));
            $this->post_img3 = basename($data['post_img3']->store('public/post_img/'));
        }elseif($request->has("post_img2")){
            $this->post_img1 = basename($data['post_img1']->store('public/post_img/'));
            $this->post_img2 = basename($data['post_img2']->store('public/post_img/'));
        }else{
            $this->post_img1 = basename($data['post_img1']->store('public/post_img/'));
        }
        $this->post_exp = $data['post_exp'];
        $this->method = $data['method'];
        $this->tool = $data['tool'];
        $this->post_tag = $data['post_tag'];


        $this->save();

        return;
    }


}

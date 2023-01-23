<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\String_;

class Post extends Model
{
    //
    // use SoftDeletes;

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
    public function post_goods()
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

    public function tools()
    {
        return $this->hasMany(Tool::class);
    }



    public function getUserTimeLine(Int $user_id)
    {
        return $this->where('user_id', $user_id)->orderBy('created_at', 'DESC')->paginate(50);
    }

    // 言い値した投稿取得
    public function getUsergoodTimeLine(Array $post_id)
    {
        return $this->whereIn('id', $post_id)->orderBy('created_at', 'DESC')->get();
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
        }elseif($request->has("post_img1")){
            $this->post_img1 = basename($data['post_img1']->store('public/post_img/'));
        }

        if($request->has("post_tag3")){
            $this->post_tag3 = basename($data['post_tag3']);
        }
        if($request->has("post_img2")){
            $this->post_tag2 = basename($data['post_tag2']);
        }if($request->has("post_img1")){
            $this->post_tag1 = basename($data['post_tag1']);
        }



        $this->post_exp = $data['post_exp'];
        $this->method = $data['method'];
        // $this->tool = $data['tool'];
        // $this->post_tag = $data['post_tag'];


        $this->save();

        return;
    }

    // 編集
    public function getEditPost(Int $user_id, Int $post_id)
    {
        return $this->where('user_id', $user_id)->where('id', $post_id)->first();
    }

    public function postUpdate(Int $post_id, Array $data)
    {
        $this->id = $post_id;
        $this->post_title = $data['post_title'];
        $this->post_exp = $data['post_exp'];
        $this->method = $data['method'];
        // $this->materials->material_name1 = $data['material_name1'];
        $this->update();

        return;
    }
    

    // 詳細画面
    public function getPost(Int $post_id)
    {
        return $this->with('user')->where('id', $post_id)->first();
    }

        // 投稿カウント
    public function getCountByPost()
    {
        return Post::select('user_id')
                ->selectRaw('COUNT(id) AS count_post')
                ->groupBy('user_id')
                ->get();
    }

    public function postDestroy(Int $user_id, Int $post_id)
    {
        // return $this->where('user_id', $user_id)->where('id', $post_id)->delete();
        return $this->where('user_id', $user_id)->delete();
    }
}

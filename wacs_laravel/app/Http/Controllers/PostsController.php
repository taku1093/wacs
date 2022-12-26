<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Follower;
use App\Models\Material;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 投稿関連
    public function index(Post $post, Follower $follower)
    {
        $user = auth()->user();
        $follow_ids = $follower->followingIds($user->id);
        // followed_idだけ抜き出す
        $following_ids = $follow_ids->pluck('followed_id')->toArray();

        $timelines = $post->getTimelines($user->id, $following_ids);

        return view('posts.index', [
            'user'      => $user,
            'timelines' => $timelines,
            // 'post'=> $post
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        $user = auth()->user();
        // $post = 

        return view('posts.create', [
            'user' => $user,
            'post' => $post
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post, Material $material)
    {
        $user = auth()->user();
        $data = $request->all();
        if ($request->has("post_img3")) {
            // 画像二枚保存時
            $validator = Validator::make($data, [
                'post_title' => ['required', 'string', 'max:140'],
                'post_img1' => ['file',  'mimes:jpeg,png,jpg', 'max:2048'],
                'post_img2' => ['file',  'mimes:jpeg,png,jpg', 'max:2048'],
                'post_img3' => ['file',  'mimes:jpeg,png,jpg', 'max:2048'],
                'post_exp' => ['required', 'string', 'max:140'],
                'method' => ['required', 'string', 'max:140'],
                'material_name' => ['required', 'string', 'max:140'],
                'tool' => ['required', 'string', 'max:140'],
                'post_tag'=> ['required', 'string', 'max:140']
            ]);
        }elseif($request->has("post_img2")) {
            // 画像3枚保存時
            $validator = Validator::make($data, [
                'post_title' => ['required', 'string', 'max:140'],
                'post_img1' => ['file',  'mimes:jpeg,png,jpg', 'max:2048'],
                'post_img2' => ['file',  'mimes:jpeg,png,jpg', 'max:2048'],
                'post_exp' => ['required', 'string', 'max:140'],
                'method' => ['required', 'string', 'max:140'],
                'material_name' => ['required', 'string', 'max:140'],
                'tool' => ['required', 'string', 'max:140'],
                'post_tag'=> ['required', 'string', 'max:140']
            ]);
        }else{
            // 画像1枚保存時
            $validator = Validator::make($data, [
                'post_title' => ['required', 'string', 'max:140'],
                'post_img1' => ['file',  'mimes:jpeg,png,jpg', 'max:2048'],
                'post_exp' => ['required', 'string', 'max:140'],
                'method' => ['required', 'string', 'max:140'],
                'material_name' => ['required', 'string', 'max:140'],
                'tool' => ['required', 'string', 'max:140'],
                'post_tag'=> ['required', 'string', 'max:140']
            ]);
        }

        $validator->validate();
        $post->postStore($user->id, $data, $request);
        $material->materialStore($post->id, $data);

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

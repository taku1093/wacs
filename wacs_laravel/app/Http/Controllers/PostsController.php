<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Follower;
use App\Models\Material;
use App\Models\Tool;

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
    public function store(Request $request, Post $post, Material $material, Tool $tool)
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
                // 'material_name' => ['required', 'string', 'max:140'],
                // 'tool' => ['required', 'string', 'max:140'],
                // 'post_tag'=> ['required', 'string', 'max:140']
            ]);
        }elseif($request->has("post_img2")) {
            // 画像3枚保存時
            $validator = Validator::make($data, [
                'post_title' => ['required', 'string', 'max:140'],
                'post_img1' => ['file',  'mimes:jpeg,png,jpg', 'max:2048'],
                'post_img2' => ['file',  'mimes:jpeg,png,jpg', 'max:2048'],
                'post_exp' => ['required', 'string', 'max:140'],
                'method' => ['required', 'string', 'max:140'],
                // 'material_name' => ['required', 'string', 'max:140'],
                // 'tool' => ['required', 'string', 'max:140'],
                // 'post_tag'=> ['required', 'string', 'max:140']
            ]);
        }else{
            // 画像1枚保存時
            $validator = Validator::make($data, [
                'post_title' => ['required', 'string', 'max:140'],
                'post_img1' => ['file',  'mimes:jpeg,png,jpg', 'max:2048'],
                'post_exp' => ['required', 'string', 'max:140'],
                'method' => ['required', 'string', 'max:140'],
                // 'material_name' => ['required', 'string', 'max:140'],
                // 'tool' => ['required', 'string', 'max:140'],
                // 'post_tag'=> ['required', 'string', 'max:140']
            ]);
        }
        // 材料
        if ($request->has("material_name10")){
                $validator = Validator::make($data, [
                    'material_name10'  => ['required', 'string', 'max:140'],
                    'material_num10'  => ['required', 'integer', 'max:140']
                ]);
        }
        if($request->has("material_name9")){
                $validator = Validator::make($data, [
                    'material_name9'  => ['required', 'string', 'max:140'],
                    'material_num9'  => ['required', 'integer', 'max:140'],
                ]);
        }
        if($request->has("material_name8")){
                $validator = Validator::make($data, [
                    'material_name8'  => ['required', 'string', 'max:140'],
                    'material_num8'  => ['required', 'integer', 'max:140'],
                ]);
            
        }
        if($request->has("material_name7")){
                $validator = Validator::make($data, [
                    'material_name7' => ['required', 'string', 'max:140'],
                    'material_num7'  => ['required', 'integer', 'max:140'],
                ]);
            
        }
        if($request->has("material_name6")){
                $validator = Validator::make($data, [
                    'material_name6'  => ['required', 'string', 'max:140'],
                    'material_num6'  => ['required', 'integer', 'max:140'],
                ]);
            
        }
        if($request->has("material_name5")){
                $validator = Validator::make($data, [
                    'material_name5' => ['required', 'string', 'max:140'],
                    'material_num5'  => ['required', 'integer', 'max:140'],
                ]);
        }
        if($request->has("material_name4")){
                $validator = Validator::make($data, [
                    'material_name4' => ['required', 'string', 'max:140'],
                    'material_num4'  => ['required', 'integer', 'max:140'],
                ]);
        }
        if($request->has("material_name3")){
                $validator = Validator::make($data, [
                    'material_name3' => ['required', 'string', 'max:140'],
                    'material_num3'  => ['required', 'integer', 'max:140'],
                ]);
        }
        if($request->has("material_name2")){
                $validator = Validator::make($data, [
                    'material_name2' => ['required', 'string', 'max:140'],
                    'material_num2'  => ['required', 'integer', 'max:140'],
                ]);
        }
        if($request->has("material_name1")){
                $validator = Validator::make($data, [
                    'material_name1'=> ['required', 'string', 'max:140'],
                    'material_num1'  => ['required', 'integer', 'max:140'],
                ]);
        }
        
        // 材料数
        if ($request->has("tool_name10")){
                $validator = Validator::make($data, [
                    'tool_name10'  => ['required', 'integer', 'max:140']
                ]);
        }
        if($request->has("tool_name9")){
                $validator = Validator::make($data, [
                    'tool_name9'  => ['required', 'integer', 'max:140']
                ]);
        }
        if($request->has("tool_name8")){
                $validator = Validator::make($data, [
                    'tool_name8'  => ['required', 'integer', 'max:140']
                ]);
            
        }
        if($request->has("tool_name7")){
                $validator = Validator::make($data, [
                    'tool_name7' => ['required', 'integer', 'max:140']
                ]);
            
        }
        if($request->has("tool_name6")){
                $validator = Validator::make($data, [
                    'tool_name6'  => ['required', 'integer', 'max:140']
                ]);
            
        }
        if($request->has("tool_name5")){
                $validator = Validator::make($data, [
                    'tool_name5' => ['required', 'integer', 'max:140']
                ]);
        }
        if($request->has("tool_name4")){
                $validator = Validator::make($data, [
                    'tool_name4' => ['required', 'integer', 'max:140']
                ]);
        }
        if($request->has("tool_name3")){
                $validator = Validator::make($data, [
                    'tool_name3' => ['required', 'integer', 'max:140']
                ]);
        }
        if($request->has("tool_name2")){
                $validator = Validator::make($data, [
                    'tool_name2' => ['required', 'integer', 'max:140']
                ]);
        }
        if($request->has("tool_name1")){
                $validator = Validator::make($data, [
                    'tool_name1'=> ['required', 'integer', 'max:140']
                ]);
        }

        // タグ
        if($request->has("post_tag3")){
            $validator = Validator::make($data, [
                'post_tag3'=> ['required', 'string', 'max:140']
            ]);
        }

        if($request->has("post_tag2")){
            $validator = Validator::make($data, [
                'post_tag2'=> ['required', 'string', 'max:140']
            ]);
        }

        if($request->has("post_tag1")){
            $validator = Validator::make($data, [
                'post_tag1'=> ['required', 'string', 'max:140']
            ]);
        }



        $validator->validate();
        $post->postStore($user->id, $data, $request);
        $material->materialStore($post->id, $data, $request);
        $tool->toolStore($post->id, $data, $request);

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

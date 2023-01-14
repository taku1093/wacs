<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Evaluation;
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
        
        $timelines = $post->orderBy('created_at', 'DESC')->paginate(50);
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
        $validator = Validator::make($data, [
            'post_title' => ['required', 'string', 'max:30'],
            'post_exp' => ['required', 'string', 'max:100'],
            'method' => ['required', 'string', 'max:1000'],
        ]);
        if ($request->has("post_img3")) {
            // 画像3枚保存時
            $validator = Validator::make($data, [
                'post_img1' => ['file',  'mimes:jpeg,png,jpg', 'max:2048'],
                'post_img2' => ['file',  'mimes:jpeg,png,jpg', 'max:2048'],
                'post_img3' => ['file',  'mimes:jpeg,png,jpg', 'max:2048'],
            ]);
        }
        if($request->has("post_img2")) {
            // 画像2枚保存時
            $validator = Validator::make($data, [
                'post_img1' => ['file',  'mimes:jpeg,png,jpg', 'max:2048'],
                'post_img2' => ['file',  'mimes:jpeg,png,jpg', 'max:2048'],
            ]);
        }if($request->has("post_img1")){
            // 画像1枚保存時
            $validator = Validator::make($data, [
                'post_img1' => ['file',  'mimes:jpeg,png,jpg', 'max:2048'],
            ]);
        }
        // 材料
        if ($request->has("material_name10")){
                $validator = Validator::make($data, [
                    'material_name10'  => ['required', 'string', 'max:20'],
                    'material_num10'  => ['required', 'integer', 'max:20']
                ]);
        }
        if($request->has("material_name9")){
                $validator = Validator::make($data, [
                    'material_name9'  => ['required', 'string', 'max:20'],
                    'material_num9'  => ['required', 'integer', 'max:20'],
                ]);
        }
        if($request->has("material_name8")){
                $validator = Validator::make($data, [
                    'material_name8'  => ['required', 'string', 'max:20'],
                    'material_num8'  => ['required', 'integer', 'max:20'],
                ]);
            
        }
        if($request->has("material_name7")){
                $validator = Validator::make($data, [
                    'material_name7' => ['required', 'string', 'max:20'],
                    'material_num7'  => ['required', 'integer', 'max:20'],
                ]);
            
        }
        if($request->has("material_name6")){
                $validator = Validator::make($data, [
                    'material_name6'  => ['required', 'string', 'max:20'],
                    'material_num6'  => ['required', 'integer', 'max:20'],
                ]);
            
        }
        if($request->has("material_name5")){
                $validator = Validator::make($data, [
                    'material_name5' => ['required', 'string', 'max:20'],
                    'material_num5'  => ['required', 'integer', 'max:20'],
                ]);
        }
        if($request->has("material_name4")){
                $validator = Validator::make($data, [
                    'material_name4' => ['required', 'string', 'max:20'],
                    'material_num4'  => ['required', 'integer', 'max:20'],
                ]);
        }
        if($request->has("material_name3")){
                $validator = Validator::make($data, [
                    'material_name3' => ['required', 'string', 'max:20'],
                    'material_num3'  => ['required', 'integer', 'max:20'],
                ]);
        }
        if($request->has("material_name2")){
                $validator = Validator::make($data, [
                    'material_name2' => ['required', 'string', 'max:20'],
                    'material_num2'  => ['required', 'integer', 'max:20'],
                ]);
        }
        if($request->has("material_name1")){
                $validator = Validator::make($data, [
                    'material_name1'=> ['required', 'string', 'max:20'],
                    'material_num1'  => ['required', 'integer', 'max:20'],
                ]);
            // $material->materialStore($post->id, $data, $request);
        }



        
        // 材料数
        if ($request->has("tool_name10")){
                $validator = Validator::make($data, [
                    'tool_name10'  => ['required', 'integer', 'max:20']
                ]);
        }
        if($request->has("tool_name9")){
                $validator = Validator::make($data, [
                    'tool_name9'  => ['required', 'integer', 'max:20']
                ]);
        }
        if($request->has("tool_name8")){
                $validator = Validator::make($data, [
                    'tool_name8'  => ['required', 'integer', 'max:20']
                ]);
            
        }
        if($request->has("tool_name7")){
                $validator = Validator::make($data, [
                    'tool_name7' => ['required', 'integer', 'max:20']
                ]);
            
        }
        if($request->has("tool_name6")){
                $validator = Validator::make($data, [
                    'tool_name6'  => ['required', 'integer', 'max:20']
                ]);
            
        }
        if($request->has("tool_name5")){
                $validator = Validator::make($data, [
                    'tool_name5' => ['required', 'integer', 'max:20']
                ]);
        }
        if($request->has("tool_name4")){
                $validator = Validator::make($data, [
                    'tool_name4' => ['required', 'integer', 'max:20']
                ]);
        }
        if($request->has("tool_name3")){
                $validator = Validator::make($data, [
                    'tool_name3' => ['required', 'integer', 'max:20']
                ]);
        }
        if($request->has("tool_name2")){
                $validator = Validator::make($data, [
                    'tool_name2' => ['required', 'integer', 'max:20']
                ]);
        }
        if($request->has("tool_name1")){
                $validator = Validator::make($data, [
                    'tool_name1'=> ['required', 'integer', 'max:20']
                ]);
                // $tool->toolStore($post->id, $data, $request);
        }

        // タグ
        if($request->has("post_tag3")){
            $validator = Validator::make($data, [
                'post_tag3'=> ['required', 'string', 'max:20']
            ]);
        }

        if($request->has("post_tag2")){
            $validator = Validator::make($data, [
                'post_tag2'=> ['required', 'string', 'max:20']
            ]);
        }

        if($request->has("post_tag1")){
            $validator = Validator::make($data, [
                'post_tag1'=> ['required', 'string', 'max:20']
            ]);
        }



        $validator->validate();
        $post->postStore($user->id, $data, $request);

        if($request->has("material_name1")){
            $material->materialStore($post->id, $data, $request);
        }
        if($request->has("tool_name1")){
            $tool->toolStore($post->id, $data, $request);
        }
        
        
        

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(post $post, Evaluation $evaluation, Comment $comment, Material $material, Tool $tool)
    {
        $user = auth()->user();
        $post = $post->getPost($post->id);

        // 評価数計算
        $eval_results = $evaluation->getCountByUser();

        $post_count = $post->getCountByPost();
        // $eval_count = $eval_results->count_user;

        
        $material = $material->getMaterial($post->id);
        $comments = $comment->getComments($post->id);

        return view('posts.show', [
            'user'     => $user,
            'eval_results' => $eval_results,
            'post_count' => $post_count,

            'post' => $post,
            'material' => $material,
            // 'tool' => $tool
            'comments' => $comments
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Material $material)
    {
        $user = auth()->user();
        $posts = $post->getEditPost($user->id, $post->id);
        $materials = $material->getEditMaterial($post->id);


        if (!isset($posts)) {
            return redirect('posts');
        }

        return view('posts.edit', [
            'user'   => $user,
            'posts' => $posts,
            'materials' => $materials
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post, Material $material, Tool $tool)
    {
        $data = $request->all();
        $materials = $material->getEditMaterial($post->id);
        
        $validator = Validator::make($data, [
            'post_title' => ['required', 'string', 'max:30'],
            'post_exp' => ['required', 'string', 'max:100'],
            'method' => ['required', 'string', 'max:1000'],
        ]);

        if($request->has("material_name1")){
            $validator = Validator::make($data, [
                'material_name1'=> ['required', 'string', 'max:20'],
                // 'material_num1'  => ['required', 'integer', 'max:20'],
            ]);
    }
    // $validator = Validator::make($data, [
    //     'tool_name1'=> ['required', 'string', 'max:20'],
    //     // 'material_num1'  => ['required', 'integer', 'max:20'],
    // ]);

        $validator->validate();
        $post->postUpdate($post->id, $data);
        // if($request->has("material_name1")){
            $material->materialUpdate($material->id, $data);
        // }
        // $tool->toolUpdate($tool->id, $data);
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $user = auth()->user();
        $post->postDestroy($user->id, $post->id);

        return redirect('posts');
    }



}

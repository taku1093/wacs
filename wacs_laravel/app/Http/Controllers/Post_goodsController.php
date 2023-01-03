<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post_good;

class Post_goodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post_good $post_good)
    {
        $user = auth()->user();
        $post_id = $request->post_id;
        $is_post_good = $post_good->isPost_good($user->id, $post_id);

        if(!$is_post_good) {
            $post_good->storePost_good($user->id, $post_id);
            return back();
        }
        return back();
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
    public function destroy(post_good $post_good)
    {
        $user_id = $post_good->user_id;
        $post_id = $post_good->post_id;
        $post_good_id = $post_good->id;
        $is_post_good = $post_good->isPost_good($user_id, $post_id);

        if($is_post_good) {
            $post_good->destroyPost_good($post_good_id);
            return back();
        }
        return back();
    }
}

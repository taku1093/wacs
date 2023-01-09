<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Comment_good;

class Comment_goodsController extends Controller
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
    public function store(Request $request, Comment_good $comment_good)
    {
        $user = auth()->user();
        $comment_id = $request->comment_id;
        $is_comment_good = $comment_good->isComment_good($user->id, $comment_id);

        if(!$is_comment_good) {
            $comment_good->storeComment_good($user->id, $comment_id);
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
    public function destroy(Comment_good $comment_good)
    {
        $user_id = $comment_good->user_id;
        $comment_id = $comment_good->comment_id;
        $comment_good_id = $comment_good->id;
        $is_comment_good = $comment_good->isComment_good($user_id, $comment_id);

        if($is_comment_good) {
            $comment_good->destroyComment_good($comment_good_id);
            return back();
        }
        return back();
    }
}

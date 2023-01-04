<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Follower;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function index_DIY(Post $post, Follower $follower)
    {

        $user = auth()->user();
        $timelines = $post->orderBy('created_at', 'DESC')->take(6)->get();
        return view('DIYhome', [
            'user'      => $user,
            'timelines' => $timelines,
            // 'post'=> $post
        ]);
    }

}

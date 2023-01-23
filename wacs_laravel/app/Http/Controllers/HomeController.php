<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Follower;
use App\Models\Post_good;
use App\Models\Ranking;

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

        $one_week = 0;
        $one_week_goods = 0;
        $two_week = 0;
        $two_week_goods = 0;
        $three_week = 0;
        $three_week_goods = 0;
        $judge1 = 0;
        $judge2 = 0;
        $judge3 = 0;
        $count1 = 0;
        $count2 = 0;
        $num = 0;
        $num2 = 0;
        $num3 = 0;
        $ready_id = 0;
        $comp_id = 0;
        $maxPostGoodId = Post_good::max('id');
        $first = 1;
        $ranking_w_start= Ranking::find($first)->week_start;
        $ranking_w_finish= Ranking::find($first)->week_finish;


        for($num = 0; $num <= 2; $num++){
            $count1 = 0;
            for($num2 = 1; $num2 <= $maxPostGoodId; $num2++){  //num2 = 0本来は
                //print(“a\n”);
                $count2 = 0;
                for($num3 = 1; $num3 <= $maxPostGoodId; $num3++){
                    if(Post_good::find($num2) !== null){
                        if(Post::find(Post_good::find($num2)->post_id) !== null){
                            if ($ranking_w_start < Post::find(Post_good::find($num2)->post_id)->created_at && Post::find(Post_good::find($num2)->post_id)->created_at < $ranking_w_finish) {
                                $judge1 = Post_good::find($num2)->post_id;
                            }else {
                                continue;
                            }
                        }else{
                            continue;
                        }
                    }else {
                        continue;
                    }


                    if(Post_good::find($num3) !== null){
                        if(Post::find(Post_good::find($num3)->post_id) !== null){
                            if ($ranking_w_start < Post::find(Post_good::find($num3)->post_id)->created_at && Post::find(Post_good::find($num3)->post_id)->created_at < $ranking_w_finish) {
                                $judge2 = Post_good::find($num3)->post_id;
                            }else {
                                continue;
                            }
                        }else{
                            continue;
                        }
                    }else {
                        continue;
                    }

                    if($one_week != 0){
                        $judge3 = $one_week;
                        if($judge3 == $judge1){
                            //print(“one_continue”);
                            //print(“\n”);
                            break;
                        }
                    }
                    if($two_week != 0){
                        //$judge3 = Post_good::find($two)->post_id;
                        //$judge3 = $number[$two];
                        $judge3 = $two_week;
                        if($judge3 == $judge1){
                            // print(“two_continue”);
                            // print(“\n”);
                            break;
                        }
                    }
                    if($judge1 == $judge2){
                        $count2 +=1;
                    }
                }
                $ready_id = $judge1;

                if($count1 != 0){
                    if($count1 < $count2){
                        $count1 = $count2;
                        $comp_id = $ready_id;
                    }
                }else{
                    $count1 = $count2;
                    if($count2 == 0){
                        continue;
                    }
                    $comp_id = $ready_id;
                }

            }
            if($one_week == 0){
                $one_week = $comp_id;
                $one_week_goods = $count1;
                continue;
            }
             if($two_week == 0){
                $two_week = $comp_id;
                $two_week_goods = $count1;
                continue;
             }
             if($three_week == 0){
                $three_week = $comp_id;
                $three_week_goods = $count1;
                continue;
             }
        }
        // return view('/ranking/ranking_week',[
        //     'maxPostGoodId' => $maxPostGoodId,
        //     'one_week' => $one_week, 
        //     'two_week' => $two_week,
        //      'three_week' => $three_week,
        //      'one_week_goods' => $one_week_goods, 
        //      'two_week_goods' => $two_week_goods,
        //       'three_week_goods' => $three_week_goods,
        // 'ranking_w_start' => $ranking_w_start, 
        // 'ranking_w_finish' => $ranking_w_finish]);

        return view('DIYhome', [
            'user'      => $user,
            'timelines' => $timelines,
            // 'post'=> $post

            'maxPostGoodId' => $maxPostGoodId,
            'one_week' => $one_week, 
            'two_week' => $two_week,
            'three_week' => $three_week,
            'one_week_goods' => $one_week_goods, 
            'two_week_goods' => $two_week_goods,
            'three_week_goods' => $three_week_goods,
            'ranking_w_start' => $ranking_w_start, 
            'ranking_w_finish' => $ranking_w_finish
        ]);
    }

}

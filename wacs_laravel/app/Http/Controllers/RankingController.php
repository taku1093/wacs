<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post_good;
use App\Models\Post;
use App\Models\Ranking;
use App\Models\User;

class RankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $first = 1;
        $one_all = 0;
        $one_all_goods = 0;
        $two_all = 0;
        $two_all_goods = 0;
        $three_all = 0;
        $three_all_goods = 0;
        $four_all = 0;
        $four_all_goods = 0;
        $five_all = 0;
        $five_all_goods = 0;
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


        for($num = 0; $num <= 4; $num++){
            $count1 = 0;
            for($num2 = 1; $num2 <= $maxPostGoodId; $num2++){  //num2 = 0本来は
                //print(“a\n”);
                $count2 = 0;
                for($num3 = 1; $num3 <= $maxPostGoodId; $num3++){
                    if(Post_good::find($num2) !== null){
                        $judge1 = Post_good::find($num2)->post_id;
                    }else {
                        continue;
                    }

                    if(Post_good::find($num3) !== null){
                        $judge2 = Post_good::find($num3)->post_id;
                    }else {
                        continue;
                    }

                    if($one_all != 0){
                        $judge3 = $one_all;
                        if($judge3 == $judge1){
                            break;
                        }
                    }
                    if($two_all != 0){
                        //$judge3 = Post_good::find($two)->post_id;
                        //$judge3 = $number[$two];
                        $judge3 = $two_all;
                        if($judge3 == $judge1){
                            // print(“two_continue”);
                            // print(“\n”);
                            break;
                        }
                    }

                    if($three_all != 0){
                        $judge3 = $three_all;
                        if($judge3 == $judge1){
                            break;
                        }
                    }

                    if($four_all != 0){
                        $judge3 = $four_all;
                        if($judge3 == $judge1){
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
            if($one_all == 0){
                $one_all = $comp_id;
                $one_all_goods = $count1;
                continue;
            }
             if($two_all == 0){
                $two_all = $comp_id;
                $two_all_goods = $count1;
                continue;
             }
             if($three_all == 0){
                $three_all = $comp_id;
                $three_all_goods = $count1;
                continue;
             }
             if($four_all == 0){
                $four_all = $comp_id;
                $four_all_goods = $count1;
                continue;
             }
             if($five_all == 0){
                $five_all = $comp_id;
                $five_all_goods = $count1;
                continue;
             }
        }

    //     $one_week = 0;
    //     $one_week_goods = 0;
    //     $two_week = 0;
    //     $two_week_goods = 0;
    //     $three_week = 0;
    //     $three_week_goods = 0;
    //     $judge1 = 0;
    //     $judge2 = 0;
    //     $judge3 = 0;
    //     $count1 = 0;
    //     $count2 = 0;
    //     $num = 0;
    //     $num2 = 0;
    //     $num3 = 0;
    //     $ready_id = 0;
    //     $comp_id = 0;
    //     $maxPostGoodId = Post_good::max('id');
    //     $ranking_w_start= Ranking::find($first)->week_start;
    //     $ranking_w_finish= Ranking::find($first)->week_finish;


    //     for($num = 0; $num <= 2; $num++){
    //         $count1 = 0;
    //         for($num2 = 1; $num2 <= $maxPostGoodId; $num2++){  //num2 = 0本来は
    //             //print(“a\n”);
    //             $count2 = 0;
    //             for($num3 = 1; $num3 <= $maxPostGoodId; $num3++){
    //                 if(Post_good::find($num2) !== null){
    //                     if(Post::find($num2) !== null){
    //                         if ($ranking_w_start < Post::find(Post_good::find($num2)->post_id)->created_at && Post::find(Post_good::find($num2)->post_id)->created_at < $ranking_w_finish) {
    //                             $judge1 = Post_good::find($num2)->post_id;
    //                         }else {
    //                             continue;
    //                         }
    //                     }else{
    //                         continue;
    //                     }
    //                 }else {
    //                     continue;
    //                 }


    //                 if(Post_good::find($num3) !== null){
    //                     if(Post::find($num3) !== null){
    //                         if ($ranking_w_start < Post::find(Post_good::find($num3)->post_id)->created_at && Post::find(Post_good::find($num3)->post_id)->created_at < $ranking_w_finish) {
    //                             $judge1 = Post_good::find($num3)->post_id;
    //                         }else {
    //                             continue;
    //                         }
    //                     }else{
    //                         continue;
    //                     }
    //                 }else {
    //                     continue;
    //                 }

    //                 if($one_week != 0){
    //                     $judge3 = $one_week;
    //                     if($judge3 == $judge1){
    //                         //print(“one_continue”);
    //                         //print(“\n”);
    //                         break;
    //                     }
    //                 }
    //                 if($two_week != 0){
    //                     //$judge3 = Post_good::find($two)->post_id;
    //                     //$judge3 = $number[$two];
    //                     $judge3 = $two_week;
    //                     if($judge3 == $judge1){
    //                         // print(“two_continue”);
    //                         // print(“\n”);
    //                         break;
    //                     }
    //                 }
    //                 if($judge1 == $judge2){
    //                     $count2 +=1;
    //                 }
    //             }
    //             $ready_id = $judge1;

    //             if($count1 != 0){
    //                 if($count1 < $count2){
    //                     $count1 = $count2;
    //                     $comp_id = $ready_id;
    //                 }
    //             }else{
    //                 $count1 = $count2;
    //                 if($count2 == 0){
    //                     continue;
    //                 }
    //                 $comp_id = $ready_id;
    //             }

    //         }
    //         if($one_week == 0){
    //             $one_week = $comp_id;
    //             $one_week_goods = $count1;
    //             continue;
    //         }
    //          if($two_week == 0){
    //             $two_week = $comp_id;
    //             $two_week_goods = $count1;
    //             continue;
    //          }
    //          if($three_week == 0){
    //             $three_week = $comp_id;
    //             $three_week_goods = $count1;
    //             continue;
    //          }
    //     }

    //     $one_month = 0;
    //     $one_month_goods = 0;
    //     $two_month = 0;
    //     $two_month_goods = 0;
    //     $three_month = 0;
    //     $three_month_goods = 0;
    //     $judge1 = 0;
    //     $judge2 = 0;
    //     $judge3 = 0;
    //     $count1 = 0;
    //     $count2 = 0;
    //     $num = 0;
    //     $num2 = 0;
    //     $num3 = 0;
    //     $ready_id = 0;
    //     $comp_id = 0;
    //     $maxPostGoodId = Post_good::max('id');
    //     $ranking_m_start= Ranking::find($first)->month_start;
    //     $ranking_m_finish= Ranking::find($first)->month_finish;


    //     for($num = 0; $num <= 2; $num++){
    //         $count1 = 0;
    //         for($num2 = 1; $num2 <= $maxPostGoodId; $num2++){  //num2 = 0本来は
    //             //print(“a\n”);
    //             $count2 = 0;
    //             for($num3 = 1; $num3 <= $maxPostGoodId; $num3++){
    //                 for($num3 = 1; $num3 <= $maxPostGoodId; $num3++){
    //                     if(Post_good::find($num2) !== null){
    //                         if(Post::find($num2) !== null){
    //                             if ($ranking_m_start < Post::find(Post_good::find($num2)->post_id)->created_at && Post::find(Post_good::find($num2)->post_id)->created_at < $ranking_m_finish) {
    //                                 $judge1 = Post_good::find($num2)->post_id;
    //                             }else {
    //                                 continue;
    //                             }
    //                         }else{
    //                             continue;
    //                         }
    //                     }else {
    //                         continue;
    //                     }
    
    
    //                     if(Post_good::find($num3) !== null){
    //                         if(Post::find($num3) !== null){
    //                             if ($ranking_m_start < Post::find(Post_good::find($num3)->post_id)->created_at && Post::find(Post_good::find($num3)->post_id)->created_at < $ranking_m_finish) {
    //                                 $judge2 = Post_good::find($num3)->post_id;
    //                             }else {
    //                                 continue;
    //                             }
    //                         }else{
    //                             continue;
    //                         }
    //                     }else {
    //                         continue;
    //                     }

    //                 if($one_month != 0){
    //                     $judge3 = $one_month;
    //                     if($judge3 == $judge1){
    //                         //print(“one_continue”);
    //                         //print(“\n”);
    //                         break;
    //                     }
    //                 }
    //                 if($two_month != 0){
    //                     //$judge3 = Post_good::find($two)->post_id;
    //                     //$judge3 = $number[$two];
    //                     $judge3 = $two_month;
    //                     if($judge3 == $judge1){
    //                         // print(“two_continue”);
    //                         // print(“\n”);
    //                         break;
    //                     }
    //                 }
    //                 if($judge1 == $judge2){
    //                     $count2 +=1;
    //                 }
    //             }
    //             $ready_id = $judge1;

    //             if($count1 != 0){
    //                 if($count1 < $count2){
    //                     $count1 = $count2;
    //                     $comp_id = $ready_id;
    //                 }
    //             }else{
    //                 $count1 = $count2;
    //                 if($count2 == 0){
    //                     continue;
    //                 }
    //                 $comp_id = $ready_id;
    //             }

    //         }
    //         if($one_month == 0){
    //             $one_month = $comp_id;
    //             $one_month_goods = $count1;
    //             continue;
    //         }
    //          if($two_month == 0){
    //             $two_month = $comp_id;
    //             $two_month_goods = $count1;
    //             continue;
    //          }
    //          if($three_month == 0){
    //             $three_month = $comp_id;
    //             $three_month_goods = $count1;
    //             continue;
    //          }
    //     }
    // }


        return view('/ranking/ranking',['one_all' => $one_all, 'two_all' => $two_all, 'three_all' => $three_all, 'one_all_goods' => $one_all_goods, 'two_all_goods' => $two_all_goods, 'three_all_goods' => $three_all_goods,
    'four_all' => $four_all, 'five_all' => $five_all, 'four_all_goods' => $four_all_goods, 'five_all_goods' => $five_all_goods]);
    }

    public function week(){
        $one_week = 0;
        $one_week_goods = 0;
        $two_week = 0;
        $two_week_goods = 0;
        $three_week = 0;
        $three_week_goods = 0;
        $four_week = 0;
        $four_week_goods = 0;
        $five_week = 0;
        $five_week_goods = 0;
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


        for($num = 0; $num <= 4; $num++){
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
                    if($three_week != 0){
                        $judge3 = $three_week;
                        if($judge3 == $judge1){
                            //print(“one_continue”);
                            //print(“\n”);
                            break;
                        }
                    }
                    if($four_week != 0){
                        $judge3 = $four_week;
                        if($judge3 == $judge1){
                            //print(“one_continue”);
                            //print(“\n”);
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
             if($four_week == 0){
                $four_week = $comp_id;
                $four_week_goods = $count1;
                continue;
            }
            if($five_week == 0){
                $five_week = $comp_id;
                $five_week_goods = $count1;
                continue;
            }
        }
        return view('/ranking/ranking_week',['maxPostGoodId' => $maxPostGoodId,'one_week' => $one_week, 'two_week' => $two_week, 'three_week' => $three_week, 'one_week_goods' => $one_week_goods, 'two_week_goods' => $two_week_goods, 'three_week_goods' => $three_week_goods,
        'four_week' => $four_week, 'five_week' => $five_week, 'four_week_goods' => $four_week_goods, 'five_week_goods' => $five_week_goods, 'ranking_w_start' => $ranking_w_start, 'ranking_w_finish' => $ranking_w_finish]);
    }
        

    public function month(){
        $one_month = 0;
        $one_month_goods = 0;
        $two_month = 0;
        $two_month_goods = 0;
        $three_month = 0;
        $three_month_goods = 0;
        $four_month = 0;
        $four_month_goods = 0;
        $five_month = 0;
        $five_month_goods = 0;
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
        $ranking_m_start= Ranking::find($first)->month_start;
        $ranking_m_finish= Ranking::find($first)->month_finish;


        for($num = 0; $num <= 4; $num++){
            $count1 = 0;
            for($num2 = 1; $num2 <= $maxPostGoodId; $num2++){  //num2 = 0本来は
                //print(“a\n”);
                $count2 = 0;
                for($num3 = 1; $num3 <= $maxPostGoodId; $num3++){
                    if(Post_good::find($num2) !== null){
                        if(Post::find(Post_good::find($num2)->post_id) !== null){
                            if ($ranking_m_start < Post::find(Post_good::find($num2)->post_id)->created_at && Post::find(Post_good::find($num2)->post_id)->created_at < $ranking_m_finish) {
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
                            if ($ranking_m_start < Post::find(Post_good::find($num3)->post_id)->created_at && Post::find(Post_good::find($num3)->post_id)->created_at < $ranking_m_finish) {
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

                    if($one_month != 0){
                        $judge3 = $one_month;
                        if($judge3 == $judge1){
                            //print(“one_continue”);
                            //print(“\n”);
                            break;
                        }
                    }
                    if($two_month != 0){
                        //$judge3 = Post_good::find($two)->post_id;
                        //$judge3 = $number[$two];
                        $judge3 = $two_month;
                        if($judge3 == $judge1){
                            // print(“two_continue”);
                            // print(“\n”);
                            break;
                        }
                    }
                    if($three_month != 0){
                        $judge3 = $three_month;
                        if($judge3 == $judge1){
                            //print(“one_continue”);
                            //print(“\n”);
                            break;
                        }
                    }
                    if($four_month != 0){
                        $judge3 = $four_month;
                        if($judge3 == $judge1){
                            //print(“one_continue”);
                            //print(“\n”);
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
            if($one_month == 0){
                $one_month = $comp_id;
                $one_month_goods = $count1;
                continue;
            }
             if($two_month == 0){
                $two_month = $comp_id;
                $two_month_goods = $count1;
                continue;
             }
             if($three_month == 0){
                $three_month = $comp_id;
                $three_month_goods = $count1;
                continue;
             }
             if($four_month == 0){
                $four_month = $comp_id;
                $four_month_goods = $count1;
                continue;
            }
            if($five_month == 0){
                $five_month = $comp_id;
                $five_month_goods = $count1;
                continue;
            }
        }
        return view('/ranking/ranking_month',['maxPostGoodId' => $maxPostGoodId,'one_month' => $one_month, 'two_month' => $two_month, 'three_month' => $three_month, 'one_month_goods' => $one_month_goods, 'two_month_goods' => $two_month_goods, 'three_month_goods' => $three_month_goods,
        'four_month' => $four_month, 'five_month' => $five_month, 'four_month_goods' => $four_month_goods, 'five_month_goods' => $five_month_goods, 'ranking_m_start' => $ranking_m_start, 'ranking_m_finish' => $ranking_m_finish]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $one_all = 0;
        $one_all_goods = 0;
        $two_all = 0;
        $two_all_goods = 0;
        $three_all = 0;
        $three_all_goods = 0;
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


        for($num = 0; $num <= 2; $num++){
            $count1 = 0;
            for($num2 = 1; $num2 <= $maxPostGoodId; $num2++){  //num2 = 0本来は
                //print(“a\n”);
                $count2 = 0;
                for($num3 = 1; $num3 <= $maxPostGoodId; $num3++){
                    if(Post_good::find($num2) !== null){
                        $judge1 = Post_good::find($num2)->post_id;
                    }else {
                        continue;
                    }

                    if(Post_good::find($num3) !== null){
                        $judge2 = Post_good::find($num3)->post_id;
                    }else {
                        continue;
                    }

                    if($one_all != 0){
                        $judge3 = $one_all;
                        if($judge3 == $judge1){
                            //print(“one_continue”);
                            //print(“\n”);
                            break;
                        }
                    }
                    if($two_all != 0){
                        //$judge3 = Post_good::find($two)->post_id;
                        //$judge3 = $number[$two];
                        $judge3 = $two_all;
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
            if($one_all == 0){
                $one_all = $comp_id;
                $one_all_goods = $count1;
                continue;
            }
             if($two_all == 0){
                $two_all = $comp_id;
                $two_all_goods = $count1;
                continue;
             }
             if($three_all == 0){
                $three_all = $comp_id;
                $three_all_goods = $count1;
                continue;
             }
        }
        return view('/ranking/ranking',['one_all' => $one_all, 'two_all' => $two_all, 'three_all' => $three_all]);

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

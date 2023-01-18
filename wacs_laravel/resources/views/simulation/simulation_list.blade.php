@extends('layouts.app')

@section('content')
<!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
        <link rel="stylesheet" type="text/css" href="./css/sim_slide.css">
        <meta charset="utf-8">
    </head>

    <body>

    <p style="text-align:center" class="backgroundImage moji" >シミュレーション</p>
    

    <!-- スライド機能   -->
    {{--  椅子  --}}
    <h2 style="text-align:center">Chair</h2>
    <ul class="slider">
        <li><a href="{{ route('simu_model1') }}"><img  src="img/simulation/sikakuisu.jpg" alt=""></a></li>
        <li><img  src="img/simulation/sikakuisu.jpg" alt=""></li>
        <li><img  src="img/simulation/sikakuisu.jpg" alt=""></li>
        <li><img  src="img/simulation/sikakuisu.jpg" alt=""></li>
        <li><img  src="img/simulation/sikakuisu.jpg" alt=""></li>
        <li><img  src="img/simulation/sikakuisu.jpg" alt=""></li>
        <li><img  src="img/simulation/sikakuisu.jpg" alt=""></li>
        <li><img  src="img/simulation/sikakuisu.jpg" alt=""></li>
    </ul>

    {{--  机  --}}
    <h2 style="text-align:center">Desk</h2>
    <ul class="slider">
        <li><a href="simu_test2.html"><img  src="img/simulation/desk.jpg" alt=""></a></li>
        <li><img  src="img/simulation/desk.jpg" alt=""></li>
        <li><img  src="img/simulation/desk.jpg" alt=""></li>
        <li><img  src="img/simulation/desk.jpg" alt=""></li>
        <li><img  src="img/simulation/desk.jpg" alt=""></li>
        <li><img  src="img/simulation/desk.jpg" alt=""></li>
        <li><img  src="img/simulation/desk.jpg" alt=""></li>
        <li><img  src="img/simulation/desk.jpg" alt=""></li>
    </ul>

    <!-- 棚 -->
    <h2 style="text-align:center">Shelf</h2>
    <ul class="slider">
        <li><a href="simu_test.html"><img  src="img/simulation/sikakuisu.jpg" alt=""></a></li>
        <li><img  src="img/simulation/sikakuisu.jpg" alt=""></li>
        <li><img  src="img/simulation/sikakuisu.jpg" alt=""></li>
        <li><img  src="img/simulation/sikakuisu.jpg" alt=""></li>
        <li><img  src="img/simulation/sikakuisu.jpg" alt=""></li>
        <li><img  src="img/simulation/sikakuisu.jpg" alt=""></li>
        <li><img  src="img/simulation/sikakuisu.jpg" alt=""></li>
        <li><img  src="img/simulation/sikakuisu.jpg" alt=""></li>
    </ul>

    <!-- その他 -->
    <h2 style="text-align:center">Another</h2>
    <ul class="slider">
        <li><a href="simu_test.html"><img  src="img/simulation/sikakuisu.jpg" alt=""></a></li>
        <li><img  src="img/simulation/sikakuisu.jpg" alt=""></li>
        <li><img  src="img/simulation/sikakuisu.jpg" alt=""></li>
        <li><img  src="img/simulation/sikakuisu.jpg" alt=""></li>
        <li><img  src="img/simulation/sikakuisu.jpg" alt=""></li>
        <li><img  src="img/simulation/sikakuisu.jpg" alt=""></li>
        <li><img  src="img/simulation/sikakuisu.jpg" alt=""></li>
        <li><img  src="img/simulation/sikakuisu.jpg" alt=""></li>
    </ul>
    
     <!-- <a href="simu_test.html">
        <img  src="img/simulation/sikakuisu.jpg" alt="次へ">
     </a> -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!--自作のJS-->
    <script src="./js/sim_slide.js"></script>
    
    </body>
    </html>

    @endsection
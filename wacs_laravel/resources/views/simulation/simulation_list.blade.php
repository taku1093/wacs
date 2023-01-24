@extends('layouts.app')

@section('content')
{{ Breadcrumbs::render('simulation') }}
<!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
        <link rel="stylesheet" type="text/css" href="./css/sim_slide.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css\bred_simulation_list.css')}}">
        <meta charset="utf-8">
        <title>シミュレーション | WACS</title>
    </head>

    <body>

    <p style="text-align:center" class="backgroundImage moji" >シミュレーション</p>

    <!-- スライド機能   -->
    {{--  椅子  --}}
    <h2 style="text-align:center">Chair</h2>
    <ul class="slider">
        <li><a href="{{ route('simu_model1') }}"><img  src="img/simulation/sikakuisu.jpg" alt=""></a></li>
        <li><a href="{{ route('simu_model7') }}"><img  src="img/simulation/silla.jpg" alt=""></a></li>
        <li><a href="{{ route('simu_model12') }}"><img  src="img/simulation/venchi.jpg" alt=""></a></li>
        <li><a href="{{ route('simu_model13') }}"><img  src="img/simulation/IKEA.jpg" alt=""></a></li>
    </ul>

    {{--  机  --}}
    <h2 style="text-align:center">Desk</h2>
    <ul class="slider">
        <li><a href="{{ route('simu_model2') }}"><img  src="img/simulation/osharedesk.jpg" alt=""></a></li>
        <li><a href="{{ route('simu_model6') }}"><img  src="img/simulation/computerdesk.jpg" alt=""></a></li>
        <li><a href="{{ route('simu_model3') }}"><img  src="img/simulation/shachodesks.jpg" alt=""></a></li>
        <li><a href="{{ route('simu_model4') }}"><img  src="img/simulation/simpledesk.jpg" alt=""></a></li>
    </ul>

    <!-- 棚 -->
    <h2 style="text-align:center">Shelf</h2>
    <ul class="slider">
        <li><a href="{{ route('simu_model8') }}"><img  src="img/simulation/hondana.jpg" alt=""></a></li>
        <li><a href="{{ route('simu_model9') }}"><img  src="img/simulation/accent_chest.jpg" alt=""></a></li>
        <li><a href="{{ route('simu_model10') }}"><img  src="img/simulation/drawer.jpg" alt=""></a></li>
        <li><a href="{{ route('simu_model14') }}"><img  src="img/simulation/old_rustic_stand.jpg" alt=""></a></li>
    </ul>

    <!-- その他 -->
    <h2 style="text-align:center">Another</h2>
    <ul class="slider">
        <li><a href="{{ route('simu_model5') }}"><img  src="img/simulation/coatStand.jpg" alt=""></a></li>
        <li><a href="{{ route('simu_model15') }}"><img  src="img/simulation/SHOE_box.jpg" alt=""></a></li>
        <li><a href="{{ route('simu_model11') }}"><img  src="img/simulation/Palette_garden_table.jpg" alt=""></a></li>
        <li><a href="{{ route('simu_model16') }}"><img  src="img/simulation/mobile.jpg" alt=""></a></li>
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
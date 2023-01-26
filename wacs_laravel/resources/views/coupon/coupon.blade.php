{{ Breadcrumbs::render('coupon') }}
@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        

        <title>TOP | WACS</title>


        {{--  <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->

        <!-- Styles -->  --}}
        <meta name="description" content="ページの概要文を記述します">
        <meta name="viewport" content="width=device-width"> <!-- スマホ表示用 -->
        <script src="./js/toggle-menu.js"></script>
        {{--  <!-- <link href="./css/top_test.css" rel="stylesheet"> -->  --}}
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

		<link rel="stylesheet" href="{{ asset('css/coupon/style.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css\bred.css')}}">
        
        



    </head>
    <body>
    {{--  <header class="header">
        <div class="header-inner"> <!--スマホ表示時にスタイリングしやすくするためのもの-->
        <a class="header-logo" href="{{ route('maintenance') }}"> <!--ロゴにトップページのリンクを貼る-->
            <img class="home-img"src="./img/logo_header.png" alt="WACS">
        </a>
        <button class="toggle-menu-button"></button> <!--スマホ用のメニューボタンの設定-->
        <!-- <div class=""> flex-center position-ref full-height -->
        <div class="header-site-menu"> <!--ナビゲーションエリアの設定-->
            @if (Route::has('login'))
                <!-- <div class="top-right links"> -->
                <nav class="site-menu">
                    @auth
                        <!-- <a href="{{ url('/home') }}">ホーム</a> -->
                        <ul>
                            <li><a href="./ranking.html" id="navline">ランキング</a></li>
                            <li><a href="./simulation.html" id="navline">シミュレーション</a></li>
                            <li><a href="./rental.html" id="navline">レンタル</a></li>
                            <li><a href="./community.html" id="navline">Q ＆ A</a></li>
                            
                            <li><a href="{{ route('maintenance') }}"><button class="styled-button" type="button">お問い合わせ</button></a></li> 
                            <li><a href="{{route('login')}}"><button class="styled-button" type="button">アイコン</button></a></li>
                            
                        </ul>
                    @else
                        <!-- <a href="{{ route('login') }}">ログイン</a> -->
                        <ul>
                            <li><a href="{{ route('maintenance') }}"><button class="styled-button" type="button">お問い合わせ</button></a></li>
                            <li><a href="{{route('login')}}"><button class="styled-button" type="button">ログイン</button></a></li>
                        </ul>
                        <!-- @if (Route::has('register'))
                            <a href="{{ route('register') }}">新規アカウント登録</a>
                        @endif -->
                    @endauth
                </nav>
                <!-- </div> -->
            @endif

            <!-- <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div> -->
        </div>
        </div>
        </header>  --}}
        <main class="main">
            
        <p class="pagetitle">クーポン一覧</p>
        @foreach ($coupons as $coupon)
            <p>　</p>

            <p>　</p>
			<div class="tab_container">
				<input id="tab1" type="radio" name="tab_item" checked>
				<label class="tab_item" for="tab1">クーポン詳細</label>
				<input id="tab2" type="radio" name="tab_item">
				<label class="tab_item" for="tab2">使用画面</label>
				<!--ココにあったタブ3のラベルを削除-->
				<!--ココにあったタブ4のラベルを削除-->
				<div class="tab_content" id="tab1_content">
					<div class="tab_content_description">
					<p style="text-align: center"><font size="5">{{ $coupon->coupon_name }}</font></p>
					<p>　</p>
					<p style="text-align: center"><img src="{{ asset('storage/' .$coupon->coupon_img_path ) }}"></p>
					<p>　</p>
					<p style="text-align: right"><font size="3">有効期限：{{ $coupon->coupon_finish }}</font></p>
					<p style="text-align: right"><font size="3">使用回数：何度でも</font></p>
					<p>　</p>
					<p style="text-align: left"><font size="4">{{ $coupon->coupon_message }}</font></p>
				</div>
			</div>
			<div class="tab_content" id="tab2_content">
				<div class="tab_content_description">
				<p style="text-align: center"><font size="5">{{ $coupon->coupon_name }}</font></p>
				<p>　</p>
				<p style="text-align: center"><img src="{{ asset('storage/' .$coupon->coupon_qr_path ) }}"></p>
				<p>　</p>
				<p style="text-align: left"><font size="4">クーポンコード：{{ $coupon->coupon_code}}</font></p>
				</div>
			</div>
			<!--ココにあったタブ3の内容を削除-->
			<!--ココにあったタブ4の内容を削除-->
			</div>
		@endforeach
		
<p>　</p>
<p>　</p>
<p>　</p>
        

    </body>

</html>

@endsection

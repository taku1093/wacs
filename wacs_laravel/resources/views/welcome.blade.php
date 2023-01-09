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
        <link href="./css/welcome.css" rel="stylesheet">

    </head>
    <body>
    {{--  <header class="header">
        <div class="header-inner"> <!--スマホ表示時にスタイリングしやすくするためのもの-->
        <a class="header-logo" href="#"> <!--ロゴにトップページのリンクを貼る-->
            <img src="./img/logo_header.png" alt="WACS">
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
                            <li><a href="#"><button class="styled-button" type="button">お問い合わせ</button></a></li> 
                            <li><a href="{{route('login')}}"><button class="styled-button" type="button">アイコン</button></a></li>
                            
                        </ul>
                    @else
                        <!-- <a href="{{ route('login') }}">ログイン</a> -->
                        <ul>
                            <li><a href="#"><button class="styled-button" type="button">お問い合わせ</button></a></li>
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
        <p class="pagetitle">ようこそ！ WACSへ</p>
        <ul class="item-list">
            <li>
                <a href="{{ route('DIY_home') }}"><img src="./img/DIY.jpg" alt="DIYのロゴ"></a>
                <dl>
                    <dt>DIY</dt>
                    <dd></dd>
                </dl>
                <p class="item-label">DIY</p>
            </li>
            <li>
                <a href="#"><img src="./img/pramodel.jpg" alt="プラモデルのロゴ"></a>
                <dl>
                    <dt>プラモデル</dt>
                    <dd></dd>
                </dl>
                <p class="item-label">PLASTIC MODEL</p>
            </li>
            <li>
                <a href="#"><img src="./img/shugei.jpg" alt="手芸のロゴ"></a>
                <dl>
                    <dt>手芸</dt>
                    <dd></dd>
                </dl>
                <p class="item-label">HANDICRAFT</p>
            </li>
            <li>
                <a href="#"><img src="./img/programming.jpg" alt="プログラミングのロゴ"></a>
                <dl>
                    <dt>プログラミング</dt>
                    <dd></dd>
                </dl>
                <p class="item-label">PROGRAMMING</p>
            </li>
            <li>
                <a href="#"><img src="./img/art.jpg" alt="アートのロゴ"></a>
                <dl>
                    <dt>美術</dt>
                    <dd></dd>
                </dl>
                <p class="item-label">ART</p>
            </li>
            <li>
                <a href="#"><img src="./img/other.jpg" alt="その他のロゴ"></a>
                <dl>
                    <dt>その他</dt>
                    <dd></dd>
                </dl>
                <p class="item-label">OTHER</p>
            </li>
        </ul>
        </main>
        
        
    </body>

</html>
@endsection
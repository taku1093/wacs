{{ Breadcrumbs::render('login') }}

@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ログイン | WACS</title>
<meta name="description"  content="">
<meta name="viewport" content="width=device-width,initial-scale=1.0">

{{--  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">  --}}
 {{-- 独自のCSS --}} 
<link rel="stylesheet" type="text/css" href="./css/login.css">
<link rel="stylesheet" type="text/css" href="{{ asset('css\bred.css')}}">
</head>
<body id=login>
    <main class="main">
    <div id="form"> {{-- ログインのフォーム --}}
        <div class="logo"> 
        {{--  <img src="./img/kasahiyoko_s.png" alt="WACS">  --}}
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"> {{--ログインのロゴ--}}
            <style>
            .text{
                font-size: 40px;
                font-weight: bold;
                font-family: "Noto Sans JP", sans-serif;
            }
            </style>
            <defs>
            <text id="text1">
                ログイン
            </text>
            </defs> 
            <use href="#text1" class="text" x="5" y="72" fill="#f4dd64" />
            <use href="#text1" class="text" x="0" y="72" fill="none" stroke="#24211b" stroke-width="2" />
        </svg>  
        </div> 

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-item-login"> {{--ログインのためのアイテム--}}
                <p class="formLabel-login">メールアドレス</p>
                <input type="email" name="email" id="email" class="form-style" autocomplete="off"/>
            </div>
            <div class="form-item-login">
                <p class="formLabel-login">パスワード</p>
                <input type="password" name="password" id="password" class="form-style" />
                <span id="view">
                    <i class="far fa-eye-slash"></i>
                </span>
                {{-- <div class="pw-view"><i class="fa fa-eye"></i></div> --}}
                <p class="forget">
                    <a href="{{ route('password_forget') }}" ><small>> パスワードを忘れた方はこちら</small></a>
                </p>  
                <p class="pull-left">
                    <a href="{{ route('register') }}"><small>> 新規アカウント作成</small></a>
                </p>
            </div>
            <div class="form-item">
                {{-- <p class="pull-left"><a href="#"><small>> 新規アカウント作成</small></a></p> --}}
                <input type="submit" class="login pull-right" value="ログイン">
                <div class="clear-fix"></div>
            </div>
        </form>
    </div>
    </main>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/js/modaal.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
<script src="./js/login.js"></script>
</body>
</html>

@endsection
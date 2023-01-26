@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <style>
            .button_solid002 a {
    position: relative;
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin: 0 auto;
    max-width: 240px;
    padding: 10px 25px;
    color: #FFF;
    transition: 0.3s ease-in-out;
    font-weight: 600;
    background: #f4dd64;
    filter: drop-shadow(0px 2px 4px #ccc);
    border-radius: 3px;
    border-radius: 50px;
}
.button_solid002 a:after {
    position: absolute;
    top: 50%;
    right: 20px;
    transition: 0.2s ease-in-out;
    /* content: "\f0da"; */
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    transform: translateY(-50%);
}
.button_solid002 a:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 30px -5px rgb(0 0 0 / 15%), 0 0 5px rgb(0 0 0 / 10%);
}
        </style>
        <title>CONTACT | WACS</title>
        {{--  <meta name="description" content="アカウントページです。">
        <meta name="viewport" content="width=device-width"> <!-- スマホ表示用 -->
        <script src="./js/toggle-menu.js"></script>
        <link href="./css/top_test.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
        <link href="./css/contact.css" rel="stylesheet">  --}}
        <meta charset="UTF-8">
        <title>お問い合わせ | WACS</title>
        <meta name="description" content="アカウントページです。">
        <meta name="viewport" content="width=device-width"> <!-- スマホ表示用 -->
        <script src="./js/toggle-menu.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/contact.css')}}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css\bred.css')}}">
    </head>
    <body>
        
        <main class="main">
            <div class="title">
                <p class="pagetitle">お問い合わせ</p>
            </div>
            <div class="contact-con">
                <p style="text-align: center"><font size="8">　お問い合わせが送信されました。　</font></p>
                <p style="text-align: center"><font size="7">　</font></p>
                <p style="text-align: center"><font size="5">　お問い合わせいただき、ありがとうございます。　</font></p>
                <p style="text-align: center"><font size="5">　</font></p>
                <p style="text-align: center"><font size="5">　近日中にあらためてご連絡いたします。　</font></p>
                <p style="text-align: center"><font size="8">　</font></p>
                <div class="button_solid002">
                    <a href="{{ url('/') }}">ホームへ戻る</a>
                </div>
            </div>
        </main>
    </body>
</html>
@endsection

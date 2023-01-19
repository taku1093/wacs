@extends('layouts.app')

@section('content')
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
    
    <link rel="stylesheet" href="{{ asset('css\kakunin.css')}}">
    <link rel="stylesheet" href="{{ asset('css\ress.css')}}">
</head>
<body>
    <label class="open" for="pop-up">ポップアップを表示する</label>
    <input type="checkbox" id="pop-up">
    <div class="overlay">
        <div class="window">
            <label class="close" for="pop-up">×</label>
            <div class="text">
                <div style="text-align: center">
                    <h1>
                        確認画面                        
                    </h1>
                    <h4>
                        本当にいいのかい
                    </h4>
                    <ul>

                        <li class="kakunin_item"><a href="https://www.kochi-tech.ac.jp/index.html">確認</a></li>
                        <li class="kyanseru_item"><a href="https://www.kochi-tech.ac.jp/index.html">戻る</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <title>新規アカウント確認 | WACS</title> 
    <link rel="stylesheet" href="{{ asset('./css/register_conf.css') }}">
</head>
<body>
<p class="pagetitle">アカウント情報の確認</p>
<div class="card-text">
    <form method="POST" action="{{ route('user.resister_resister') }}">
        @csrf
        <div class="md-form">
            <!-- <label for="user_name">氏名</label> -->
            <label for="user_name"><dt class="item"><span>氏名</span></dt></label>
            <dd class="input-item">{{ $input["user_name"] }}</dd>
            <input class="form-control" type="hidden" id="user_name" name="user_name"  value="{{ $input["user_name"] }}">
        </div>

        <div class="md-form">
            <!-- <label for="user_name_kana">氏名(かな)</label> -->
            <label for="user_name_kana"><dt class="item"><span>氏名(かな)</span></dt></label>
            <dd class="input-item">{{ $input["user_name_kana"] }}</dd>
            <input class="form-control" type="hidden" id="user_name_kana" name="user_name_kana"  value="{{ $input["user_name_kana"] }}">
        </div>

        <div class="md-form">
            <!-- <label for="user_screen_name">ユーザネーム</label> -->
            <label for="user_screen_name"><dt class="item"><span>ユーザネーム</span></dt></label>
            <dd class="input-item">{{ $input["user_screen_name"] }}</dd>
            <input class="form-control" type="hidden" id="user_screen_name" name="user_screen_name"  value="{{ $input["user_screen_name"] }}">
        </div>

        <div class="md-form">
            <!-- <label for="user_gen">性別</label> -->
            <label for="user_gen"><dt class="item"><span>性別</span></dt></label>
            <dd class="input-item">{{ $input["user_gen"] }}</dd>
            <input class="form-control" type="hidden" id="user_gen" name="user_gen"  value="{{ $input["user_gen"] }}">
        </div>

        <div class="md-form">
            <!-- <label for="birth">生年月日</label> -->
            <label for="birth"><dt class="item"><span>生年月日</span></dt></label>
            <dd class="input-item">{{ $input["year"] }}/{{ $input["month"] }}/{{ $input["date"] }}</dd>
            <input class="form-control" type="hidden" id="year" name="year"  value="{{ $input["year"] }}">
            <input class="form-control" type="hidden" id="month" name="month"  value="{{ $input["month"] }}">
            <input class="form-control" type="hidden" id="date" name="date"  value="{{ $input["date"] }}">
        </div>

        <div class="md-form">
            <!-- <label for="user_pre">住所（都道府県）</label> -->
            <label for="user_pre"><dt class="item"><span>住所（都道府県）</span></dt></label>
            <dd class="input-item">{{ $input["user_pre"] }}</dd>
            <input class="form-control" type="hidden" id="user_pre" name="user_pre"  value="{{ $input["user_pre"] }}">
        </div>

        <div class="md-form">
            <!-- <label for="user_city">住所（市区町村）</label> -->
            <label for="user_city"><dt class="item"><span>住所（市区町村）</span></dt></label>
            <dd class="input-item">{{ $input["user_city"] }}</dd>
            <input class="form-control" type="hidden" id="user_city" name="user_city"  value="{{ $input["user_city"] }}">
        </div>

        <div class="md-form">
            <!-- <label for="user_tell">電話番号</label> -->
            <label for="user_tell"><dt class="item"><span>電話番号</span></dt></label>
            <dd class="input-item">{{ $input["user_tell"] }}</dd>
            <input class="form-control" type="hidden" id="user_tell" name="user_tell"  value="{{ $input["user_tell"] }}">
        </div>

        <div class="md-form">
            <!-- <label for="name">メールアドレス</label> -->
            <label for="name"><dt class="item"><span>メールアドレス</span></dt></label>
            <dd class="input-item">{{ $input["email"] }}</dd>
            <input class="form-control" type="hidden" id="email" name="email"  value="{{ $input["email"] }}">
        </div>

        <div class="md-form">
            <!-- <label for="password">パスワード</label> -->
            <label for="password"><dt class="item"><span>パスワード</span></dt></label>
            <dd class="input-item">{{ $input["password"] }}</dd>
            <input class="form-control" type="hidden" id="password" name="password"  value="{{ $input["password"] }}" required autocomplete="new-password">
        </div>

        <div class="md-form">
            <label for="password-confirm"></label>
            <input id="password-confirm" type="hidden" class="form-control input-text" name="password_confirmation" value="{{ $input["password_confirmation"] }}" required autocomplete="new-password">
        </div>
        <div class="btn">
            <button class="submit-button" type="submit" name="back">戻る</button>
            <button class="submit-button" type="submit">登録</button>
        </div>
    </form>
</div>
</body>
@endsection
@extends('layouts.app')

@section('content')

<head>
    <meta charset="UTF-8">
    <title>新規アカウント確認 | WACS</title>
    <meta name="description" content="利用規約ページです。">
</head>
<body>
<div class="card-text">
    <form method="POST" action="{{ route('user.resister_resister') }}">
        @csrf
        <div class="md-form">
            <label for="user_name">氏名</label>
            {{ サトシ}}
            <input class="form-control" type="hidden" id="user_name" name="user_name"  value="サトシ">
        </div>

        <div class="md-form">
            <label for="user_name_kana">氏名(かな)</label>
            {{ さとし }}
            <input class="form-control" type="hidden" id="user_name_kana" name="user_name_kana"  value="さとし">
        </div>

        <div class="md-form">
            <label for="user_screen_name">ユーザネーム</label>
            {{ ポケモンマスター }}
            <input class="form-control" type="hidden" id="user_screen_name" name="user_screen_name"  value="ポケモンマスター">
        </div>

        <div class="md-form">
            <label for="user_gen">性別</label>
            {{ 男 }}
            <input class="form-control" type="hidden" id="user_gen" name="user_gen"  value="男">
        </div>

        <div class="md-form">
            <label for="birth">生年月日</label>
            {{ 1997 }}/{{ 10 }}/{{ 10 }}
            <input class="form-control" type="hidden" id="year" name="year"  value="{{ $input["year"] }}">
            <input class="form-control" type="hidden" id="month" name="month"  value="{{ $input["month"] }}">
            <input class="form-control" type="hidden" id="date" name="date"  value="{{ $input["date"] }}">
        </div>

        <div class="md-form">
            <label for="user_pre">住所（都道府県）</label>
            {{ カント―地方 }}
            <input class="form-control" type="hidden" id="user_pre" name="user_pre"  value="{{ $input["user_pre"] }}">
        </div>

        <div class="md-form">
            <label for="user_city">住所（市区町村）</label>
            {{ マサラタウン }}
            <input class="form-control" type="hidden" id="user_city" name="user_city"  value="{{ $input["user_city"] }}">
        </div>

        <div class="md-form">
            <label for="user_tell">電話番号</label>
            {{ 0120049725 }}
            <input class="form-control" type="hidden" id="user_tell" name="user_tell"  value="{{ $input["user_tell"] }}">
        </div>

        <div class="md-form">
            <label for="name">メールアドレス</label>
            {{ pokemon@nintendo.com }}
            <input class="form-control" type="hidden" id="email" name="email"  value="{{ $input["email"] }}">
        </div>

        <div class="md-form">
            <label for="password">パスワード</label>
            {{ 12345678 }}
            <input class="form-control" type="hidden" id="password" name="password"  value="{{ $input["password"] }}" required autocomplete="new-password">
        </div>

        <div class="md-form">
            <label for="password-confirm"></label>
            <input id="password-confirm" type="hidden" class="form-control input-text" name="password_confirmation" value="{{ $input["password_confirmation"] }}" required autocomplete="new-password">
        </div>

        <button class="btn btn-block blue-gradient mt-2 mb-2" type="submit" name="back">戻って変更する</button>
        <button class="btn btn-block blue-gradient mt-2 mb-2" type="submit">確認して登録する</button>
    </form>
</div>
</body>
@endsection
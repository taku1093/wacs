@extends('layouts.app')

@section('content')

<body>
<div class="card-text">
    <form method="POST" action="{{ route('user.resister_resister') }}">
        @csrf
        <div class="md-form">
            <label for="user_name">氏名</label>
            {{ $input["user_name"] }}
            <input class="form-control" type="hidden" id="user_name" name="user_name"  value="{{ $input["user_name"] }}">
        </div>

        <div class="md-form">
            <label for="user_name_kana">氏名(かな)</label>
            {{ $input["user_name_kana"] }}
            <input class="form-control" type="hidden" id="user_name_kana" name="user_name_kana"  value="{{ $input["user_name_kana"] }}">
        </div>

        <div class="md-form">
            <label for="user_screen_name">ユーザネーム</label>
            {{ $input["user_screen_name"] }}
            <input class="form-control" type="hidden" id="user_screen_name" name="user_screen_name"  value="{{ $input["user_screen_name"] }}">
        </div>

        <div class="md-form">
            <label for="user_gen">性別</label>
            {{ $input["user_gen"] }}
            <input class="form-control" type="hidden" id="user_gen" name="user_gen"  value="{{ $input["user_gen"] }}">
        </div>

        <div class="md-form">
            <label for="birth">生年月日</label>
            {{ $input["year"] }}/{{ $input["month"] }}/{{ $input["date"] }}
            <input class="form-control" type="hidden" id="year" name="year"  value="{{ $input["year"] }}">
            <input class="form-control" type="hidden" id="month" name="month"  value="{{ $input["month"] }}">
            <input class="form-control" type="hidden" id="date" name="date"  value="{{ $input["date"] }}">
        </div>

        <div class="md-form">
            <label for="user_pre">住所（都道府県）</label>
            {{ $input["user_pre"] }}
            <input class="form-control" type="hidden" id="user_pre" name="user_pre"  value="{{ $input["user_pre"] }}">
        </div>

        <div class="md-form">
            <label for="user_city">住所（市区町村）</label>
            {{ $input["user_city"] }}
            <input class="form-control" type="hidden" id="user_city" name="user_city"  value="{{ $input["user_city"] }}">
        </div>

        <div class="md-form">
            <label for="user_tell">電話番号</label>
            {{ $input["user_tell"] }}
            <input class="form-control" type="hidden" id="user_tell" name="user_tell"  value="{{ $input["user_tell"] }}">
        </div>

        <div class="md-form">
            <label for="name">メールアドレス</label>
            {{ $input["email"] }}
            <input class="form-control" type="hidden" id="email" name="email"  value="{{ $input["email"] }}">
        </div>

        <div class="md-form">
            <label for="password">パスワード</label>
            {{ $input["password"] }}
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
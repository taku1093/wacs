{{ Breadcrumbs::render('contact') }}

@extends('layouts.app')

@section('content')



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>お問い合わせ | WACS</title>
        <meta name="description" content="アカウントページです。">
        <meta name="viewport" content="width=device-width"> <!-- スマホ表示用 -->
        <script src="./js/toggle-menu.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
        <link href="./css/contact.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css\bred.css')}}">
    </head>

    <body>
        
        <main class="main">

        <p class="pagetitle">お問い合わせ</p>

            <div class="map">
                <h2>アクセスマップ</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3322.4071146931665!2d133.71762991507362!3d33.62068458072555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3551fea409c4f4f5%3A0xb58b5ba34875c748!2z6auY55-l5bel56eR5aSn5a2mIOmmmee-juOCreODo-ODs-ODkeOCuQ!5e0!3m2!1sja!2sjp!4v1668000492853!5m2!1sja!2sjp" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            
            <div class="contact">
                <h2>お問い合わせフォーム</h2>

                <form action="{{ route('contact_store') }}"> <!--action属性はフォーム送信のためのプログラムファイルにリンク-->
                    <dl class="form-area">
                        <dt><span class="required">お名前</span></dt>
                        <dd><input class="input-text" type="text" name="name" required></dd> <!--name属性はフォームを受信したプログラムが各項目を判別するための属性、requiredは必須項目なので入力がなければ警告を表示-->
                        <dt><span class="required">メールアドレス</span></dt>
                        <dd><input class="input-text" type="email" name="email" required></dd>
                        <dt>お電話番号</dt>
                        <dd><input class="input-text" type="tel" name="tel"></dd>
                        <dt>お問い合わせ種別</dt>
                        <dd>
                            <select class="select-box-contact" name="genre"> <!--セレクトボックス-->
                                <option value="SNSについて" selected>SNSについて</option> <!--value属性はどの項目が選択されたのかを認識-->
                                <option value="広告について">広告について</option>
                                <option value="ランキングについて">ランキングについて</option>
                                <option value="シミュレーションについて">シミュレーションについて</option>
                                <option value="Q＆Aについて">Q&Aについて</option>
                                <option value="アカウント退会について">アカウント退会について</option>
                                <option value="パスワード変更のお問い合わせ">パスワード変更のお問い合わせ</option>
                                <option value="その他">その他</option>
                            </select>
                        </dd>
                        <dt>お客様について</dt>
                        <dd>
                            <label class="radio-button"><input type="radio" name="user_type" value="一般のお客様" checked>一般のお客様</label>
                            <label class="radio-button"><input type="radio" name="user_type" value="企業様">企業様</label>
                            <label class="radio-button"><input type="radio" name="user_type" value="その他">その他</label>
                        </dd>
                        <dt><span class="required">お問い合わせ内容</span></dt>
                        <dd><textarea class="message" name="message" required></textarea></dd>
                    </dl>
                    <p class="confirm-text">ご入力内容をご確認の上、お間違いがなければ [送信] ボタンを押してください。</p>
                    <div class="cen">
                        <button class="submit-button" type="submit">送信</button>
                    </div>
                </form>
            </div>
        </main>
    </body>
</html>
@endsection
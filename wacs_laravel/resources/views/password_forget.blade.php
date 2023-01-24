<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>パスワードを忘れた方 | WACS</title>
    <style>
        button.more {
            width: 180px;
            margin: 40px auto;
            display: block;
            background-color: #f4dd64;
            color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, .2);
            border: 3px solid #f4dd64;
            font-weight: bold;
            padding: 10px 15px;
            outline: 0;
            transition: .5s;
            border-radius: 24px;
        }

        button.more:hover {
            background-color: #fff;
            color: #f4dd64;
        }

        .company-name {
            font-weight: bold;
        }
    </style>
</head>

<body class="bgimg">
    <div class="flex flex-col justify-center items-center w-screen h-screen">
        <h1 class="text-center text-2xl font-bold">パスワードのお忘れの方</h1>
        <dl class="text-center text-lg font-bold mt-4">
            <!-- <dt>【メンテナンス日時】</dt> -->
            <dd class="mt-2 text-red-600">現在ご自身でのパスワードの再発行はできません。</dd>
        </dl>
        <p class="text-center mt-4">お手数ではございますが、下記のお問い合わせボタンよりパスワード再発行の旨を管理者にお伝えくださいますようお願いいたします。</p>
        <!-- <img src="./icon/kouzichuu.png" alt="img_position" width="300" height="200"> -->
        <!-- <div class="btn">
            <button type="submit" name="contact" class="btn submit-button">
                お問い合わせ
            </button>
        </div> -->
        <a href="{{ route('contact') }}"><button class="more">お問い合わせ</button></a>
        <p class="text-center company-name">株式会社 LA</p>
    </div>
</body>

</html>
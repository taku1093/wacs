@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>アカウント登録 | WACS</title>
    <meta name="description" content="アカウントページです。">
    <meta name="viewport" content="width=device-width"> <!-- スマホ表示用 -->
    <script src="./js/toggle-menu.js"></script>
    <link href="./common.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="./css/newaccount_create.css" rel="stylesheet">

    

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js?ver=1.12.4' id='jquery-core-js'></script>
    {{--  <script src='./garlic.js'></script>  --}}
    
</head>
<body>
    {{--  <header class="header">
        <div class="header-inner"> <!--スマホ表示時にスタイリングしやすくするためのもの-->
            <a class="header-logo" href="./common.html"> <!--ロゴにトップページのリンクを貼る-->
                <img src="logo_header.png" alt="WACS">
            </a>
            <button class="toggle-menu-button"></button> <!--スマホ用のメニューボタンの設定-->
            <div class="header-site-menu"> <!--ナビゲーションエリアの設定-->
                <nav class="site-menu">
                    <ul>
                        <li><a href="./inquiry.html"><button class="styled-button" type="button">お問い合わせ</button></a></li>
                    </ul>
                </nav>
            </div> 
        </div> 
    </header>  --}}

    <main class="main">
        <p class="pagetitle">アカウント情報登録</p>
        <p class="pagesubtitle">WACSの利用に当たってアカウント情報の登録をお願いします。</p>
        <p class="pagesubtitle2">個人情報に関して、他のユーザに対し、公開することはありません。</p>
        <div class="account">
            <!-- {{--  <form id="accountform"  method="POST" action="{{ route('register') }}" > 完了画面に遷移  --}} -->
            <form id="accountform"  method="POST" action="{{ route('user.register_post') }}" > <!-- 完了画面に遷移 -->
                @csrf
                <dl class="form-area">
                    <dt><span class="required">氏名(全角)</span></dt>
                    <dd><input id="user_name" class="input-text validate[required,maxSize[10]]" type="text" name="user_name" placeholder="10文字以内" value="{{ old('user_name') }}"></dd> <!--name属性はフォームを受信したプログラムが各項目を判別するための属性、requiredは必須項目なので入力がなければ警告を表示-->

                    <dt><span class="required">氏名(ふりがな)</span></dt>
                    <dd><input id="user_name_kana" class="input-text validate[required,maxSize[20]]" type="text" name="user_name_kana" placeholder="20文字以内"  value="{{ old('user_name_kana') }}"></dd>


                    <dt><span class="required">ユーザネーム</span></dt>
                    <dd><input class="input-text validate[required,maxSize[30]]" type="text" name="user_screen_name" placeholder="30文字以内" id="user_screen_name" value="{{ old('user_screen_name') }}"></dd>


                    <dt><span class="required">性別</span></dt>
                    <dd>
                        <input type="radio" id="user_gen" class="validate[required]" name="user_gen" value="男姓" checked />
                            <label for="user_gen">男性</label>
                        <input type="radio" id="user_gen" class="validate[required]" name="user_gen" value="女性" />
                            <label for="user_gen">女性</label>
                        <input type="radio" id="user_gen" class="validate[required]" name="user_gen" value="回答しない" />
                            <label for="user_gen">回答しない</label>
                    </dd>

                    <dt><span for="birth" class="required">生年月日</span></dt>
                    <dd>
                        <select id="year" class="validate[required]" name="year"><option value="">----</option></select> 
                            <label for="year">年</label>
                        <select id="month" class="validate[required]" name="month"><option value="">--</option></select> 
                            <label for="month">月</label>
                        <select id="date" class="validate[required]" name="date"><option value="">--</option></select> 
                            <label for="date">日</label>
                    </dd>

                    <dt><span class="required">住所(都道府県)</span></dt>
                    <dd><select name="user_pre" id="user_pre" class="input-text validate[required]">
                        <option value="" selected="selected">都道府県を選択</option>
                        <option value="北海道" data-pref-id="1">北海道</option>
                        <option value="青森県" data-pref-id="2">青森県</option>
                        <option value="岩手県" data-pref-id="3">岩手県</option>
                        <option value="宮城県" data-pref-id="4">宮城県</option>
                        <option value="秋田県" data-pref-id="5">秋田県</option>
                        <option value="山形県" data-pref-id="6">山形県</option>
                        <option value="福島県" data-pref-id="7">福島県</option>
                        <option value="茨城県" data-pref-id="8">茨城県</option>
                        <option value="栃木県" data-pref-id="9">栃木県</option>
                        <option value="群馬県" data-pref-id="10">群馬県</option>
                        <option value="埼玉県" data-pref-id="11">埼玉県</option>
                        <option value="千葉県" data-pref-id="12">千葉県</option>
                        <option value="東京都" data-pref-id="13">東京都</option>
                        <option value="神奈川県" data-pref-id="14">神奈川県</option>
                        <option value="新潟県" data-pref-id="15">新潟県</option>
                        <option value="富山県" data-pref-id="16">富山県</option>
                        <option value="石川県" data-pref-id="17">石川県</option>
                        <option value="福井県" data-pref-id="18">福井県</option>
                        <option value="山梨県" data-pref-id="19">山梨県</option>
                        <option value="長野県" data-pref-id="20">長野県</option>
                        <option value="岐阜県" data-pref-id="21">岐阜県</option>
                        <option value="静岡県" data-pref-id="22">静岡県</option>
                        <option value="愛知県" data-pref-id="23">愛知県</option>
                        <option value="三重県" data-pref-id="24">三重県</option>
                        <option value="滋賀県" data-pref-id="25">滋賀県</option>
                        <option value="京都府" data-pref-id="26">京都府</option>
                        <option value="大阪府" data-pref-id="27">大阪府</option>
                        <option value="兵庫県" data-pref-id="28">兵庫県</option>
                        <option value="奈良県" data-pref-id="29">奈良県</option>
                        <option value="和歌山県" data-pref-id="30">和歌山県</option>
                        <option value="鳥取県" data-pref-id="31">鳥取県</option>
                        <option value="島根県" data-pref-id="32">島根県</option>
                        <option value="岡山県" data-pref-id="33">岡山県</option>
                        <option value="広島県" data-pref-id="34">広島県</option>
                        <option value="山口県" data-pref-id="35">山口県</option>
                        <option value="徳島県" data-pref-id="36">徳島県</option>
                        <option value="香川県" data-pref-id="37">香川県</option>
                        <option value="愛媛県" data-pref-id="38">愛媛県</option>
                        <option value="高知県" data-pref-id="39">高知県</option>
                        <option value="福岡県" data-pref-id="40">福岡県</option>
                        <option value="佐賀県" data-pref-id="41">佐賀県</option>
                        <option value="長崎県" data-pref-id="42">長崎県</option>
                        <option value="熊本県" data-pref-id="43">熊本県</option>
                        <option value="大分県" data-pref-id="44">大分県</option>
                        <option value="宮崎県" data-pref-id="45">宮崎県</option>
                        <option value="鹿児島県" data-pref-id="46">鹿児島県</option>
                        <option value="沖縄県" data-pref-id="47">沖縄県</option>
                        <label for="user_pre"></label>
                    </select></dd>

                    <dt><span class="required">住所(市区町村)</span></dt>
                    <dd><input class="input-text validate[required,maxSize[30]]" type="text" name="user_city" placeholder="市区町村のみ入力" id="user_city" value="{{ old('user_city') }}"></dd>

                    <dt><span class="required">電話番号</span></dt>
                    <dd><input class="input-text validate[required,custom[phone],maxSize[21]]" type="user_tell" name="user_tell" pattern="[\d-]*" placeholder="ハイフンなし" id="user_tell" value="{{ old('user_tell') }}"></dd>


                    <dt><span class="required">メールアドレス</span></dt>
                    <dd><input class="input-text validate[required,custom[email],maxSize[255]]" type="text" name="email" id="email" value="{{ old('email') }}"></dd> 

                    {{--  パスワード  --}}
                    <dt><span class="required"><label for="password" class=""></label>パスワード</span></dt>
                    <dd>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input-text validate[required, minSize[8], maxSize[16]]" name="password" required placeholder="8～16文字以内" autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </dd>
                    {{--  パスワード確認  --}}
                    <dt><span class="required"><label for="password-confirm" class=""></label>パスワード(確認)</span></dt>
                    <dd>
                            <input id="password-confirm" type="password" class="form-control input-text validate[required,equals[password]]" name="password_confirmation" required autocomplete="new-password">
                    </dd>

                    <dt><span class="required">利用規約</span></dt>
                    <dd><input type="checkbox" class="validate[minCheckbox[1]]" name="kiyaku" id="mincheck1" value="yes"> <a href="{{ route('terms') }}" id="kiyaku">利用規約</a>に同意します。 </dd>
                </dl>

                    <script type="text/javascript">
                            window.onload=function(){
                            var arg = location.search.split(/\?|\&/);
                            for(var i=0;i<arg.length;i++){
                            if(! arg[i])continue;
                            var pair = arg[i].split(/=/);
                            var obj = document.getElementsByName(pair[0]);
                            if(obj) obj[0].checked = true;
                            }
                            }
                    </script>
                
                <div class="btn">
                    <p class="confirm-text">ご入力内容をご確認の上、お間違いがなければ 確認 ボタンを押してください。</p>
                    <button class="submit-button" type="submit" id="touroku">確認</button>
                </div>
                <!-- <input type="submit" value="会員登録を行う" id="touroku"> -->
            </form>
        </div>
    </main>
    {{--  <footer class="footer">
        <!-- <nav class="site-menu">
            <ul>
                <li><a href="./ranking.html">ランキング</a></li>
                <li><a href="./simulation.html">シミュレーション</a></li>
                <li><a href="./rental.html">レンタル</a></li>
                <li><a href="./community.html">Q ＆ A</a></li>
            </ul>
        </nav> -->
        <a class="footer-logo" href="./index.html">
            <img src="img/logo_header.png" alt="WACS">
        </a>
        <p class="footer-tel"></p>
        <p class="footer-name"></p>
        <p class="copyright"><small>Copyright &copy; 2022 LA Inc. All Rights Reserved.</small></p>
    </footer>  --}}

    <!-- 閏年を考慮した生年月日のjavascript -->
    <script type="text/javascript">
        $(function() {
                    // 現在の年月日を取得
                    var time = new Date();
                    var year = time.getFullYear();
                    var month = time.getMonth() + 1;
                    var date = time.getDate();

                    // 選択された年月日を取得
                    var selected_year = document.getElementById("year").value;
                    var selected_month = document.getElementById("month").value;

                    // 年(初期): 1900〜現在の年 の値を設定
                    for (var i = year; i >= 1900 ; i--) {
                        $('#year').append('<option value="' + i + '">' + i + '</option>');
                    }

                    // 月(初期): 1~12 の値を設定
                    for (var j = 1; j <= 12; j++) {
                        $('#month').append('<option value="' + j + '">' + j + '</option>');
                    }

                    // 日(初期): 1~31 の値を設定
                    for (var k = 1; k <= 32; k++) {
                        $('#date').append('<option value="' + k + '">' + k + '</option>');
                    }

                    // 月(変更)：選択された年に合わせて、適した月の値を選択肢にセットする
                    $('#year').change(function() {
                        selected_year = $('#year').val();

                        // 現在の年が選択された場合、月の選択肢は 1~現在の月 に設定
                        // それ以外の場合、1~12 に設定
                        var last_month = 12;
                        if (selected_year == year) {
                            last_month = month;
                        }
                        $('#month').children('option').remove();
                        $('#month').append('<option value="' + 0 + '">--</option>');
                        for (var n = 1; n <= last_month; n++) {
                            $('#month').append('<option value="' + n + '">' + n + '</option>');
                        }
                    });

                    // 日(変更)：選択された年・月に合わせて、適した日の値を選択肢にセットする
                    $('#year,#month').change(function() {
                        selected_year = $('#year').val();
                        selected_month = $('#month').val();

                        // 現在の年・月が選択された場合、日の選択肢は 1~現在の日付 に設定
                        // それ以外の場合、各月ごとの最終日を判定し、1~最終日 に設定
                        if (selected_year == year && selected_month == month ) {
                            var last_date = date;
                        }else{
                            // 2月：日の選択肢は1~28日に設定
                            // ※ ただし、閏年の場合は29日に設定
                            if (selected_month == 2) {
                                if((Math.floor(selected_year%4 == 0)) && (Math.floor(selected_year%100 != 0)) || (Math.floor(selected_year%400 == 0))){
                                    last_date = 29;
                                }else{
                                    last_date = 28;
                                }

                            // 4, 6, 9, 11月：日の選択肢は1~30日に設定
                            }else if(selected_month == 4 || selected_month == 6 || selected_month == 9 || selected_month == 11 ){
                                last_date = 30;

                            // 1, 3, 5, 7, 8, 10, 12月：日の選択肢は1~31日に設定
                            }else{
                                last_date = 31;
                            }
                        }

                        $('#date').children('option').remove();
                        $('#date').append('<option value="' + 0 + '">--</option>');
                        for (var m = 1; m <= last_date; m++) {
                            $('#date').append('<option value="' + m + '">' + m + '</option>');
                        }
                    });

                });
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.min.css" type="text/css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery-1.8.2.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-ja.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js" type="text/javascript" charset="utf-8"></script>
    <!-- 1行目は、jQuery-Validation-Engineのスタイルシートを読み込んでいます。
    2行目は、jQuery本体を読み込んでいます。既に別の用途でjQuery本体を読み込み済みなら、この記述は省略して下さい。
    3行目は、jQuery-Validation-Engineの日本語化スクリプトを読み込んでいます。エラーメッセージを日本語で表示させたい場合に必要です。
    4行目は、jQuery-Validation-Engineの本体スクリプトを読み込んでいます。 -->
    
    <script type="text/javascript">
        jQuery(document).ready(function(){
        jQuery("#accountform").validationEngine();
        });
    </script>

</body>
</html>
@endsection
@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
  .contents {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    width: 60%;
    margin: 30px 0;
    padding-top: 30px;
}
.item {
    width: calc(100% / 3 - 30px);
    margin-bottom: 30px;
    padding: 50px 10px;
    text-align: center;
}

#info {
    width: 250px;
    height: 50px;
}

#good {
    width: 20px;
    height: 40px;
    background-color: #f4dd64;
  }
#goods {
    width: 120px;
    height: 40px;
}

/* solid002 */
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
    background: #6bb6ff;
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


        <title>週間ランキング | WACS</title>


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
        <link href="{{ asset('css/welcome_in.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="./css/ranking/style.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        
        



    </head>
    <body>
        <main class="main">
            
        <p class="pagetitle">ランキング</p>
        
            {{--  {{ $one_week }}
            {{ $two_week }}
            {{ $three_week }}  --}}

            <p>　</p>

            <p>　</p>

<div class="tabs">
  <input id="all" type="radio" name="tab_item">
  <label class="tab_item" for="all"><a href="{{ route('ranking_all') }}">　　　　総合ランキング　　　　</a></label>

  <input id="programming" type="radio" name="tab_item" checked>
  <label class="tab_item" for="programming"><a href="{{ route('ranking_week') }}">　　　　週間ランキング　　　　</a></label>
  
  <input id="design" type="radio" name="tab_item">
  <label class="tab_item" for="design"><a href="{{ route('ranking_month') }}">　　　　月間ランキング　　　　</a></label>


  
  <div class="tab_content" id="all_content">

    <div class="tab_content_description">
    <p>　</p>
    「総合ランキング」を押して💗
    



    </div>
  </div>
  <div class="tab_content" id="programming_content">
  <div class="tab_content_description">
  <p style="text-align: center">期間[{{ $ranking_w_start }}] 〜 [{{ $ranking_w_finish }}]</p>
    <p>　</p>
        
    <div class="rank_card">
            <div class="rank"  float: right;>
                <img src="{{asset('img/rank_1.png') }}">
                <a>　</a>
            </div>
            <div class="picture">
            @if ( \App\Models\User::find( ( \App\Models\Post::find($one_week)->user_id ) ) ->user_icon == null)
              {{--  デフォルトアイコン  --}}
              <a href="{{ url('users/' .\App\Models\Post::find($one_week)->user_id) }}"><img src="{{asset('img/default_icon.png') }}" alt="デフォルトアイコン" class="circle-image"></a>
            @else
              {{--  任意アイコン  --}}
              <a href="{{ url('users/' .\App\Models\Post::find($one_week)->user_id) }}"><img src="{{ asset('storage/user_icon/' .\App\Models\User::find( ( \App\Models\Post::find($one_week)->user_id ) )->user_icon) }}"  class="circle-image"></a>
            @endif
            </div>
            <div id="info">
                <p style="text-align: left"><font size="3">　タイトル[{{ \App\Models\Post::find($one_week)->post_title }}]<br>
                　ユーザネーム:{{ \App\Models\User::find( ( \App\Models\Post::find($one_week)->user_id ) )->user_screen_name }}</font></p>
            </div>

            <div id="goods">
            <p style="text-align: right"><font size="5">　💗×{{ $one_week_goods }}　</font></p>
            </div>
            <div class="button_solid002">
            <a href="{{ url('posts/' .$one_week) }}">投稿詳細</a>
            </div>
        </div>

        <p>　</p>
        
        <div class="rank_card">
            <div class="rank"  float: right;>
                <img src="{{asset('img/rank_2.png') }}">
                <a>　</a>
            </div>
            <div class="picture">
            @if ( \App\Models\User::find( ( \App\Models\Post::find($two_week)->user_id ) ) ->user_icon == null)
              {{--  デフォルトアイコン  --}}
              <a href="{{ url('users/' .\App\Models\Post::find($two_week)->user_id) }}"><img src="{{asset('img/default_icon.png') }}" alt="デフォルトアイコン" class="circle-image"></a>
            @else
              {{--  任意アイコン  --}}
              <a href="{{ url('users/' .\App\Models\Post::find($two_week)->user_id) }}"><img src="{{ asset('storage/user_icon/' .\App\Models\User::find( ( \App\Models\Post::find($two_week)->user_id ) )->user_icon) }}"  class="circle-image"></a>
            @endif
            </div>
            <div id="info">
                <p style="text-align: left"><font size="3">　タイトル[{{ \App\Models\Post::find($two_week)->post_title }}]<br>
                　ユーザネーム:{{ \App\Models\User::find( ( \App\Models\Post::find($two_week)->user_id ) )->user_screen_name }}</font></p>
            </div>

            <div id="goods">
            <p style="text-align: right"><font size="5">　💗×{{ $two_week_goods }}　</font></p>
            </div>
            <div class="button_solid002">
            <a href="{{ url('posts/' .$two_week) }}">投稿詳細</a>
            </div>
        </div>


        <p>　</p>
        
        <div class="rank_card">
            <div class="rank"  float: right;>
                <img src="{{asset('img/rank_3.png') }}">
                <a>　</a>
            </div>
            <div class="picture">
            @if ( \App\Models\User::find( ( \App\Models\Post::find($three_week)->user_id ) ) ->user_icon == null)
              {{--  デフォルトアイコン  --}}
              <a href="{{ url('users/' .\App\Models\Post::find($three_week)->user_id) }}"><img src="{{asset('img/default_icon.png') }}" alt="デフォルトアイコン" class="circle-image"></a>
            @else
              {{--  任意アイコン  --}}
              <a href="{{ url('users/' .\App\Models\Post::find($three_week)->user_id) }}"><img src="{{ asset('storage/user_icon/' .\App\Models\User::find( ( \App\Models\Post::find($three_week)->user_id ) )->user_icon) }}"  class="circle-image"></a>
            @endif
            </div>
            <div id="info">
                <p style="text-align: left"><font size="3">　タイトル[{{ \App\Models\Post::find($three_week)->post_title }}]<br>
                　ユーザネーム:{{ \App\Models\User::find( ( \App\Models\Post::find($three_week)->user_id ) )->user_screen_name }}</font></p>
            </div>

            <div id="goods">
            <p style="text-align: right"><font size="5">　💗×{{ $three_week_goods }}　</font></p>
            </div>
            <div class="button_solid002">
            <a href="{{ url('posts/' .$three_week) }}">投稿詳細</a>
            </div>
        </div>
        <p>　</p>

        <div class="rank_card">
            <div class="rank"  float: right;>
                <img src="{{asset('img/rank_4.png') }}">
                <a>　</a>
            </div>
            <div class="picture">
            @if ( \App\Models\User::find( ( \App\Models\Post::find($four_week)->user_id ) ) ->user_icon == null)
              {{--  デフォルトアイコン  --}}
              <a href="{{ url('users/'.\App\Models\Post::find($four_week)->user_id) }}"><img src="{{asset('img/default_icon.png') }}" alt="デフォルトアイコン" class="circle-image"></a>
            @else
              {{--  任意アイコン  --}}
              <a href="{{ url('users/'.\App\Models\Post::find($four_week)->user_id) }}"><img src="{{ asset('storage/user_icon/' .\App\Models\User::find( ( \App\Models\Post::find($four_week)->user_id ) )->user_icon) }}"  class="circle-image"></a>
            @endif
            </div>
            <div id="info">
                <p style="text-align: left"><font size="3">　タイトル[{{ \App\Models\Post::find($four_week)->post_title }}]<br>
                　ユーザネーム:{{ \App\Models\User::find( ( \App\Models\Post::find($four_week)->user_id ) )->user_screen_name }}</font></p>
            </div>
            <div id="goods">
            <p style="text-align: right"><font size="5">　💗×{{ $four_week_goods }}　</font></p>
            </div>
            <div class="button_solid002">
            <a href="{{ url('posts/' .$four_week) }}">投稿詳細</a>
            </div>
        </div>
        <p>　</p>
        <div class="rank_card">
            <div class="rank"  float: right;>
                <img src="{{asset('img/rank_5.png') }}">
                <a>　</a>
            </div>
            <div class="picture">
            @if ( \App\Models\User::find( ( \App\Models\Post::find($five_week)->user_id ) ) ->user_icon == null)
              {{--  デフォルトアイコン  --}}
              <a href="{{ url('users/'.\App\Models\Post::find($five_week)->user_id) }}"><img src="{{asset('img/default_icon.png') }}" alt="デフォルトアイコン" class="circle-image"></a>
            @else
              {{--  任意アイコン  --}}
              <a href="{{ url('users/'.\App\Models\Post::find($five_week)->user_id) }}"><img src="{{ asset('storage/user_icon/' .\App\Models\User::find( ( \App\Models\Post::find($five_week)->user_id ) )->user_icon) }}"  class="circle-image"></a>
            @endif
            </div>
            <div id="info">
                <p style="text-align: left"><font size="3">　タイトル[{{ \App\Models\Post::find($five_week)->post_title }}]<br>
                　ユーザネーム:{{ \App\Models\User::find( ( \App\Models\Post::find($five_week)->user_id ) )->user_screen_name }}</font></p>
            </div>
            <div id="goods">
            <p style="text-align: right"><font size="5">　💗×{{ $five_week_goods }}　</font></p>
            </div>
            <div class="button_solid002">
            <a href="{{ url('posts/' .$five_week) }}">投稿詳細</a>
            </div>
        </div>
        
     


    </div>
  </div>

  <div class="tab_content" id="design_content">
  <div class="tab_content_description">
    <p>　</p>
    「月間ランキング」を押して💗
     


    </div>
  </div>
</div>
</div>
<p>　</p>
<p>　</p>
<p>　</p>
        
    <main class="py-4">
        @yield('ranking_week')
    </main>
    </body>

</html>

@endsection


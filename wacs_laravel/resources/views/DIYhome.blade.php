

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOME | WACS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- cssファイルの設定など -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css\thumne.css')}}"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css\bred.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css\DIY_home.css')}}">
    
    {{--  ハートマーク用  --}}
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/ranking/style.css') }}">

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
    
    {{--  <link rel="stylesheet" href="{{ asset('./css/headder_fotter.css') }}">  --}}
</head>
@extends('layouts.app')

@section('content')

{{ Breadcrumbs::render('DIY_home') }}




{{--  ページタイトル  --}}
<!-- <p class="pagetitle">DIY HOME</p> -->
<div class='title' style="background-image: url('{{ asset('/img/DIYhome.jpg') }}');">
    <h1>Do It Yourself !!!!<h1>
    <p>ホーム</P>
</div>

<!-- ニュース -->
<div class="inner">
    <p class="sub_title_rank">NEWS</p>

     <!-- ここからニュース記事 -->
     <ul class="news_list">
              <li class="news_list_item">
                <a href="">
                  <div class="news_list_date">
                    <time>2023.02.01</time>
                    <p class="news_item">お知らせ</p>
                  </div>
                  <p>2023年2月2日(木)に高知工科大学の講義で「WACS」が紹介されます。</p>
                  <!-- <span class="arrow"></span> -->
                </a>
              </li>
              <li class="news_list_item">
                <a href="">
                  <div class="news_list_date">
                    <time>2023.01.27</time>
                    <p class="news_item">お知らせ</p>
                  </div>
                  <p>プラモデル・手芸・プログラミング・美術・その他のコンテンツページをメンテナンスいたします。<br>
                     ユーザの皆様には大変ご迷惑をおかけいたします。<br>
                     期間：2023年2月1日(水)～2023年2月28日(火)まで
                  </p>
                  <!-- <span class="arrow"></span> -->
                </a>
              </li>
              <li class="news_list_item">
                <a href="">
                  <div class="news_list_date">
                    <time>2023.01.24</time>
                    <p class="news_item_contact">お問い合わせ返信</p>
                  </div>
                  <p>お問い合わせ内容：アカウントに公式マークを追加してほしい。<br>
                     回答：今後の協議を重ねて検討いたします。
                  </p>
                  <!-- <span class="arrow"></span> -->
                </a>
              </li>
              <li class="news_list_item">
                <a href="">
                  <div class="news_list_date">
                    <time>2023.01.20</time>
                    <p class="news_item">お知らせ</p>
                  </div>
                  <p>コンテンツ共有システムアプリケーション「WACS」がオープンしました。</p>
                  <!-- <span class="arrow"></span> -->
                </a>
              </li>
        </ul>
</div>

<div class="container">
    <!-- タイムライン -->
    <p class="sub_title">TIME LINE</p>
    @extends('thumbnail')
    @section('thumbnail')
</div>
<div class="more-button-area">
    <a href="{{ url('posts') }}"><button class="styled-button_p" type="button">もっと見る</button></a>
</div>

<!-- ランキング -->
<div>
    <p class="sub_title_rank">ランキング</p>
    {{--  @extends('ranking.ranking_week')
    @section('ranking_week')  --}}

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
        「もっと見る」を押して💗
        
    
    
    
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
    
            
    
    
        </div>
      </div>
    
      <div class="tab_content" id="design_content">
      <div class="tab_content_description">
        <p>　</p>
        「もっと見る」を押して💗
         
    
    
        </div>
      </div>
    </div>
    </div>
    <p>　</p>
    <div class="more-button-area">
      <a href="{{ url('ranking_week') }}"><button class="styled-button_p" type="button">もっと見る</button></a>
  </div>
</div>

@endsection
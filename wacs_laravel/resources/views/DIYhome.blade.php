

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
</div>

@endsection
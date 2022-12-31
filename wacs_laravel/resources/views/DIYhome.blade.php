
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HOME | WACS</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <!-- cssファイルの設定など -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css\DIY_home.css')}}">
  {{--  <link rel="stylesheet" href="{{ asset('./css/headder_fotter.css') }}">  --}}
</head>

@extends('layouts.app')

@section('content')
<body>
  <!-- <header>
    <div class="collapse bg-dark" id="Navbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4 class="text-white">概要</h4>
            <p class="text-muted">下のアルバム、著者、またはその他の背景の背景に関する情報を追加。人々はいくつかの有益なおいしさを拾うことができるように、それはいくつかの文章を長くする。その後、ソーシャルネットワーキングサイトや連絡先にリンクすること。</p>
          </div>
          <div class="col-sm-4 offset-md-1 py-4">
            <h4 class="text-white">要望</h4>
            <ul class="list-unstyled">
              <li><a href="#" class="text-white">Twitterでフォロー</a></li>
              <li><a href="#" class="text-white">Facebookでいいね</a></li>
              <li><a href="#" class="text-white">メールを送信</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container d-flex justify-content-between">
        <a href="#" class="navbar-brand d-flex align-items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
          <strong>アルバム</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar" aria-controls="Navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
  </header> -->

  <main role="main">
    <!-- <section class="jumbotron text-center">
      <div class="container">
        <h1>アルバムの実例</h1>
        <p class="lead text-muted">短くて、その下のコレクション、そのコンテンツ、クリエイターなどを指し示すものではない。短くて甘いですが、あまりにも短くはないので、人々はそれを完全にスキップしない。</p>
        <p>
          <a href="#" class="btn btn-primary my-2">アクションへの主な呼びかけ</a>
          <a href="#" class="btn btn-secondary my-2">二次的なアクション</a>
        </p>
      </div>
    </section> -->

    <div class="album py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">

              <div class="flex">
                <div class="circle-image"><img src="./icon/50.png" width="32" height="32"></div> <!--アイコン画像を丸く表示-->
                <div class="user_name">TEST1</div>

                <!-- ホーム画面のサムネイルの場合には以下を通報のみにしてください。マイページのサムネイルの場合には通報以外を表示するような処理が必要です。-->
                <div class="dropdown">
                  <button class="dropdown__btn" id="dropdown__btn1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="64"/><circle cx="256" cy="448" r="64"/><circle cx="256" cy="64" r="64"/></svg>
                  </button>
                  <div class="dropdown__body">
                    <ul class="dropdown__list">
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">編集する</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">共有する</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">通報</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link red" style="color: red;">投稿を削除</a></li>
                    </ul>
                  </div>
                </div>
                <!-- ここまで (dropdown)-->

              </div>
              
              <div class="img_area">
              <img src="./img/sample_thumne.jpg" class="img_position" alt="" width="300" height="200">
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"><title>カード画像のキャプション</title><rect fill="#55595c" width="100%" height="100%" /><text fill="#eceeef" dy=".3em" x="50%" y="50%">サムネイル</text></svg> -->
              </div>
              <div class="card-body">
                <p class="card-text">伊豆を作った</p>
                <p class="card-text">これは、追加コンテンツへの自然な導入として以下のテキストをサポートする、より幅広いカード。このコンテンツはもう少し長くなる。</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">見る</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">編集</button>
                  </div>
                  <small class="text-muted">9 分前</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <div class="flex">
                <div class="circle-image"><img src="./icon/50.png" width="32" height="32"></div> <!--アイコン画像を丸く表示-->
                <div class="user_name">TEST1</div>
                <!-- ホーム画面のサムネイルの場合には以下を通報のみにしてください。マイページのサムネイルの場合には通報以外を表示するような処理が必要です。-->
                <div class="dropdown">
                  <button class="dropdown__btn" id="dropdown__btn2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="64"/><circle cx="256" cy="448" r="64"/><circle cx="256" cy="64" r="64"/></svg>
                  </button>
                  <div class="dropdown__body">
                    <ul class="dropdown__list">
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">編集する</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">共有する</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">通報</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link red" style="color: red;">投稿を削除</a></li>
                    </ul>
                  </div>
                </div>
                <!-- ここまで (dropdown)-->
              </div>
              <div class="img_area">
            　<img src="./img/sample_thumne.jpg" class="img_position" alt="" width="300" height="200">
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"><title>カード画像のキャプション</title><rect fill="#55595c" width="100%" height="100%" /><text fill="#eceeef" dy=".3em" x="50%" y="50%">サムネイル</text></svg> -->
              </div>
              <div class="card-body">
                <p class="card-text">伊豆を作った</p>
                <p class="card-text">これは、追加コンテンツへの自然な導入として以下のテキストをサポートする、より幅広いカード。このコンテンツはもう少し長くなる。</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">見る</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">編集</button>
                  </div>
                  <small class="text-muted">9 分前</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <div class="flex">
                <div class="circle-image"><img src="./icon/50.png" width="32" height="32"></div> <!--アイコン画像を丸く表示-->
                <div class="user_name">TEST1</div>
                <!-- ホーム画面のサムネイルの場合には以下を通報のみにしてください。マイページのサムネイルの場合には通報以外を表示するような処理が必要です。-->
                <div class="dropdown">
                  <button class="dropdown__btn" id="dropdown__btn3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="64"/><circle cx="256" cy="448" r="64"/><circle cx="256" cy="64" r="64"/></svg>
                  </button>
                  <div class="dropdown__body">
                    <ul class="dropdown__list">
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">編集する</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">共有する</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">通報</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link red" style="color: red;">投稿を削除</a></li>
                    </ul>
                  </div>
                </div>
                <!-- ここまで (dropdown)-->
              </div>
              <div class="img_area">
            　<img src="./img/sample_thumne.jpg" class="img_position" alt="" width="300" height="200">
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"><title>カード画像のキャプション</title><rect fill="#55595c" width="100%" height="100%" /><text fill="#eceeef" dy=".3em" x="50%" y="50%">サムネイル</text></svg> -->
              </div>
              <div class="card-body">
                <p class="card-text">伊豆を作った</p>
                <p class="card-text">これは、追加コンテンツへの自然な導入として以下のテキストをサポートする、より幅広いカード。このコンテンツはもう少し長くなる。</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">見る</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">編集</button>
                  </div>
                  <small class="text-muted">9 分前</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <div class="flex">
                <div class="circle-image"><img src="./icon/50.png" width="32" height="32"></div> <!--アイコン画像を丸く表示-->
                <div class="user_name">TEST1</div>
                <!-- ホーム画面のサムネイルの場合には以下を通報のみにしてください。マイページのサムネイルの場合には通報以外を表示するような処理が必要です。-->
                <div class="dropdown">
                  <button class="dropdown__btn" id="dropdown__btn4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="64"/><circle cx="256" cy="448" r="64"/><circle cx="256" cy="64" r="64"/></svg>
                  </button>
                  <div class="dropdown__body">
                    <ul class="dropdown__list">
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">編集する</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">共有する</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">通報</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link red" style="color: red;">投稿を削除</a></li>
                    </ul>
                  </div>
                </div>
                <!-- ここまで (dropdown)-->
              </div>
              <div class="img_area">
            　<img src="./img/sample_thumne.jpg" class="img_position" alt="" width="300" height="200">
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"><title>カード画像のキャプション</title><rect fill="#55595c" width="100%" height="100%" /><text fill="#eceeef" dy=".3em" x="50%" y="50%">サムネイル</text></svg> -->
              </div>
              <div class="card-body">
                <p class="card-text">伊豆を作った</p>
                <p class="card-text">これは、追加コンテンツへの自然な導入として以下のテキストをサポートする、より幅広いカード。このコンテンツはもう少し長くなる。</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">見る</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">編集</button>
                  </div>
                  <small class="text-muted">9 分前</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <div class="flex">
                <div class="circle-image"><img src="./icon/50.png" width="32" height="32"></div> <!--アイコン画像を丸く表示-->
                <div class="user_name">TEST1</div>
                <!-- ホーム画面のサムネイルの場合には以下を通報のみにしてください。マイページのサムネイルの場合には通報以外を表示するような処理が必要です。-->
                <div class="dropdown">
                  <button class="dropdown__btn" id="dropdown__btn5">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="64"/><circle cx="256" cy="448" r="64"/><circle cx="256" cy="64" r="64"/></svg>
                  </button>
                  <div class="dropdown__body">
                    <ul class="dropdown__list">
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">編集する</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">共有する</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">通報</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link red" style="color: red;">投稿を削除</a></li>
                    </ul>
                  </div>
                </div>
                <!-- ここまで (dropdown)-->
              </div>
              <div class="img_area">
            　<img src="./img/sample_thumne.jpg" class="img_position" alt="" width="300" height="200">
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"><title>カード画像のキャプション</title><rect fill="#55595c" width="100%" height="100%" /><text fill="#eceeef" dy=".3em" x="50%" y="50%">サムネイル</text></svg> -->
              </div>
              <div class="card-body">
                <p class="card-text">伊豆を作った</p>
                <p class="card-text">これは、追加コンテンツへの自然な導入として以下のテキストをサポートする、より幅広いカード。このコンテンツはもう少し長くなる。</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">見る</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">編集</button>
                  </div>
                  <small class="text-muted">9 分前</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <div class="flex">
                <div class="circle-image"><img src="./icon/50.png" width="32" height="32"></div> <!--アイコン画像を丸く表示-->
                <div class="user_name">TEST1</div>
                <!-- ホーム画面のサムネイルの場合には以下を通報のみにしてください。マイページのサムネイルの場合には通報以外を表示するような処理が必要です。-->
                <div class="dropdown">
                  <button class="dropdown__btn" id="dropdown__btn6">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="64"/><circle cx="256" cy="448" r="64"/><circle cx="256" cy="64" r="64"/></svg>
                  </button>
                  <div class="dropdown__body">
                    <ul class="dropdown__list">
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">編集する</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">共有する</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">通報</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link red" style="color: red;">投稿を削除</a></li>
                    </ul>
                  </div>
                </div>
                <!-- ここまで (dropdown)-->
              </div>
              <div class="img_area">
            　<img src="./img/sample_thumne.jpg" class="img_position" alt="" width="300" height="200">
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"><title>カード画像のキャプション</title><rect fill="#55595c" width="100%" height="100%" /><text fill="#eceeef" dy=".3em" x="50%" y="50%">サムネイル</text></svg> -->
              </div>
              <div class="card-body">
                <p class="card-text">伊豆を作った</p>
                <p class="card-text">これは、追加コンテンツへの自然な導入として以下のテキストをサポートする、より幅広いカード。このコンテンツはもう少し長くなる。</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">見る</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">編集</button>
                  </div>
                  <small class="text-muted">9 分前</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <div class="flex">
                <div class="circle-image"><img src="./icon/50.png" width="32" height="32"></div> <!--アイコン画像を丸く表示-->
                <div class="user_name">TEST1</div>
                <!-- ホーム画面のサムネイルの場合には以下を通報のみにしてください。マイページのサムネイルの場合には通報以外を表示するような処理が必要です。-->
                <div class="dropdown">
                  <button class="dropdown__btn" id="dropdown__btn7">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="64"/><circle cx="256" cy="448" r="64"/><circle cx="256" cy="64" r="64"/></svg>
                  </button>
                  <div class="dropdown__body">
                    <ul class="dropdown__list">
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">編集する</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">共有する</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">通報</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link red" style="color: red;">投稿を削除</a></li>
                    </ul>
                  </div>
                </div>
                <!-- ここまで (dropdown)-->
              </div>
              <div class="img_area">
            　<img src="./img/sample_thumne.jpg" class="img_position" alt="" width="300" height="200">
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"><title>カード画像のキャプション</title><rect fill="#55595c" width="100%" height="100%" /><text fill="#eceeef" dy=".3em" x="50%" y="50%">サムネイル</text></svg> -->
              </div>
              <div class="card-body">
                <p class="card-text">伊豆を作った</p>
                <p class="card-text">これは、追加コンテンツへの自然な導入として以下のテキストをサポートする、より幅広いカード。このコンテンツはもう少し長くなる。</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">見る</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">編集</button>
                  </div>
                  <small class="text-muted">9 分前</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <div class="flex">
                <div class="circle-image"><img src="./icon/50.png" width="32" height="32"></div> <!--アイコン画像を丸く表示-->
                <div class="user_name">TEST1</div>
                <!-- ホーム画面のサムネイルの場合には以下を通報のみにしてください。マイページのサムネイルの場合には通報以外を表示するような処理が必要です。-->
                <div class="dropdown">
                  <button class="dropdown__btn" id="dropdown__btn8">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="64"/><circle cx="256" cy="448" r="64"/><circle cx="256" cy="64" r="64"/></svg>
                  </button>
                  <div class="dropdown__body">
                    <ul class="dropdown__list">
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">編集する</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">共有する</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">通報</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link red" style="color: red;">投稿を削除</a></li>
                    </ul>
                  </div>
                </div>
                <!-- ここまで (dropdown)-->
              </div>
              <div class="img_area">
            　<img src="./img/sample_thumne.jpg" class="img_position" alt="" width="300" height="200">
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"><title>カード画像のキャプション</title><rect fill="#55595c" width="100%" height="100%" /><text fill="#eceeef" dy=".3em" x="50%" y="50%">サムネイル</text></svg> -->
              </div>
              <div class="card-body">
                <p class="card-text">伊豆を作った</p>
                <p class="card-text">これは、追加コンテンツへの自然な導入として以下のテキストをサポートする、より幅広いカード。このコンテンツはもう少し長くなる。</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">見る</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">編集</button>
                  </div>
                  <small class="text-muted">9 分前</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <div class="flex">
                <div class="circle-image"><img src="./icon/50.png" width="32" height="32"></div> <!--アイコン画像を丸く表示-->
                <div class="user_name">TEST1</div>
                <!-- ホーム画面のサムネイルの場合には以下を通報のみにしてください。マイページのサムネイルの場合には通報以外を表示するような処理が必要です。-->
                <div class="dropdown">
                  <button class="dropdown__btn" id="dropdown__btn9">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="64"/><circle cx="256" cy="448" r="64"/><circle cx="256" cy="64" r="64"/></svg>
                  </button>
                  <div class="dropdown__body">
                    <ul class="dropdown__list">
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">編集する</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">共有する</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">通報</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link red" style="color: red;">投稿を削除</a></li>
                    </ul>
                  </div>
                </div>
                <!-- ここまで (dropdown)-->
              </div>
              <div class="img_area">
            　<img src="./img/sample_thumne.jpg" class="img_position" alt="" width="300" height="200">
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"><title>カード画像のキャプション</title><rect fill="#55595c" width="100%" height="100%" /><text fill="#eceeef" dy=".3em" x="50%" y="50%">サムネイル</text></svg> -->
              </div>
              <div class="card-body">
                <p class="card-text">伊豆を作った</p>
                <p class="card-text">これは、追加コンテンツへの自然な導入として以下のテキストをサポートする、より幅広いカード。このコンテンツはもう少し長くなる。</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">見る</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">編集</button>
                  </div>
                  <small class="text-muted">9 分前</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <div class="flex">
                <div class="circle-image"><img src="./icon/50.png" width="32" height="32"></div> <!--アイコン画像を丸く表示-->
                <div class="user_name">TEST1</div>
                <!-- ホーム画面のサムネイルの場合には以下を通報のみにしてください。マイページのサムネイルの場合には通報以外を表示するような処理が必要です。-->
                <div class="dropdown">
                  <button class="dropdown__btn" id="dropdown__btn10">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="64"/><circle cx="256" cy="448" r="64"/><circle cx="256" cy="64" r="64"/></svg>
                  </button>
                  <div class="dropdown__body">
                    <ul class="dropdown__list">
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">編集する</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">共有する</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link">通報</a></li>
                      <li class="dropdown__item"><a href="#" class="dropdown__item-link red" style="color: red;">投稿を削除</a></li>
                    </ul>
                  </div>
                </div>
                <!-- ここまで (dropdown)-->
              </div>
              <div class="img_area">
            　<img src="./img/sample_thumne.jpg" class="img_position" alt="" width="300" height="200">
              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"><title>カード画像のキャプション</title><rect fill="#55595c" width="100%" height="100%" /><text fill="#eceeef" dy=".3em" x="50%" y="50%">サムネイル</text></svg> -->
              </div>
              <div class="card-body">
                <p class="card-text">伊豆を作った</p>
                <p class="card-text">これは、追加コンテンツへの自然な導入として以下のテキストをサポートする、より幅広いカード。このコンテンツはもう少し長くなる。</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">見る</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">編集</button>
                  </div>
                  <small class="text-muted">9 分前</small>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div><!-- /.album	-->
  </main>

  <!-- <footer class="text-muted">
    <div class="container">
      <p class="float-right">
        <a href="#">トップに戻る</a>
      </p>
      <p>このアルバムの実例は &copy; Bootstrap だが、ダウンロードして自分でカスタマイズすること！</p>
      <p>Bootstrapが初めてなら、<a href="http://getbootstrap.com/" target="_blank">ホームページ</a>にアクセスするか、<a href="../getting-started/introduction">スタートガイド</a>を読むように。</p>
    </div>
  </footer> -->

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <!--自作のJS-->
  <script>
    $(".openbtn").click(function () {
    $(this).toggleClass('active');
    });
  </script>

  <!-- サムネイル右上のボタンのJavascript-->
  <script>
    (function () {
      document.addEventListener('DOMContentLoaded', function() { // HTML解析が終わったら
        // var array_10 = [];
        // for (var i = 1; i <= 10; i++) {
        //   const btn = array_10.push(document.getElementById('dropdown__btn' + i)); // ボタンをidで取得
        // }
        const btn = document.getElementById('dropdown__btn1'); 
        if(btn) { // ボタンが存在しないときにエラーになるのを回避
          btn.addEventListener('click', function(){ //ボタンがクリックされたら
            this.classList.toggle('is-open'); // is-openを付加する
          });
        }
      });
    }());
  </script>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js" integrity="sha384-Qg00WFl9r0Xr6rUqNLv1ffTSSKEFFCDCKVyHZ+sVt8KuvG99nWw5RNvbhuKgif9z" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <!-- JavaScriptプラグインの設定など -->
</body>

</html>
@endsection
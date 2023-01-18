@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
   

    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>HOME | WACS</title>
  
      <!-- cssファイルの設定など -->
      {{--  ハートマーク用  --}}
      <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{ asset('css\user\Mypage.css')}}">
      
  </head>
  
  <body>
    <main class="main">
      
    <div class="box1">
      <div class="back"></div>
      <div class="mypage">
        <div class="border border-bottom">マイページ</div>                
      </div>
      <div class="hamburger-menu">
        <input type="checkbox" id="menu-btn-check">
        <label for="menu-btn-check" class="menu-btn"><span></span></label>
        <div class="menu-content">
          <ul>
              <li>
                  <a href="https://www.kochi-tech.ac.jp/index.html">退会</a>
              </li>
              <li>
                  <a href="https://www.kochi-tech.ac.jp/index.html">マイページ情報編集</a>
              </li>
              <li>
                  <a href="https://www.kochi-tech.ac.jp/index.html">アカウント編集</a>
              </li>
              <li>
                  <a href="https://www.kochi-tech.ac.jp/index.html">レンタル一覧</a>
              </li>
          </ul>
        </div>
      </div>
    </div>
      
    <div class="user">
      {{--  ユーザアイコン  --}}
      <div class="picture">
        @if ($user->user_icon == null)
            {{--  デフォルトアイコン  --}}
          <img src="{{asset('img/default_icon.png') }}" alt="デフォルトアイコン" class="circle-image">
        @else
            {{--  任意アイコン  --}}
          <img src="{{ asset('storage/user_icon/' .$user->user_icon) }}"  class="circle-image">
        @endif
      </div>

      {{--  ユーザネームなど  --}}
      <div class="user-card">
        {{--  ユーザネーム  --}}
        <div class="username">
          <h2>{{$user->user_screen_name }}</h2>
        </div>

        {{--  生年月日  --}}
        <div class="userbirth">
          <p class="birth">
            {{$user->year }}/{{$user->month }}/{{$user->date }}
          </p>
        </div>

        {{--  自己紹介  --}}
        <div class="usercomment ">
          @if ($user->user_intro == null)
            <p class="user_intro">自己紹介がまだありません</p>
          @else
            <p class="user_intro">{{$user->user_intro}}</p>
          @endif
        </div>
      </div>

      {{--  投稿数など  --}}
      <div class="user-card-sub">
        <div class="post-num">
          <h2>投稿</h2>
          <p class="user-text">46件</p>
        </div>
      </div>

    </div> 
        
        <!--タブの設定-->
        <div class="tabbox">
          <input type="radio" name="tabset" id="tabcheck1" checked><label for="tabcheck1" class="tab" id="mynav"><div class="character"><p id=vw>投稿</p></div></label>
          <input type="radio" name="tabset" id="tabcheck2"        ><label for="tabcheck2" class="tab" id="mynav"><div class="character"><p id=vw>フォロー</p></div></label>
          <input type="radio" name="tabset" id="tabcheck3"        ><label for="tabcheck3" class="tab" id="mynav"><div class="character"><p id=vw>フォロワー</p></div></label>
          <input type="radio" name="tabset" id="tabcheck4"        ><label for="tabcheck4" class="tab" id="maynav"><div class="character"><p id=vw>いいね</p></div></label>

          <div class="tabcontent" id="tabcontent1"><!-- タブ投稿の中身 -->
            <div id="top" class="wrapper">
              <div class="text-show">
                <ul class="product-list">
                <li><!-- 1つのliが1つの投稿を指す -->
                  <a href="https://www.kochi-tech.ac.jp/index.html"><!-- 閲覧画面 -->
                    <img src="https://3.bp.blogspot.com/-shGNRiV5CTw/WTd4lpwf2eI/AAAAAAABEoo/bpVr6YyILvkUcFqwHtDn5UOt8JfexPiDQCLcB/s800/gakkou_isu_chair.png" alt=""><!-- 画像 -->
                    <p>タイトル</p>
                    <p>文章</p>
                  </a>
                </li>
                <li><!-- 1つのliが1つの投稿を指す -->
                  <a href="https://www.kochi-tech.ac.jp/index.html"><!-- 閲覧画面 -->
                    <img src="https://3.bp.blogspot.com/-shGNRiV5CTw/WTd4lpwf2eI/AAAAAAABEoo/bpVr6YyILvkUcFqwHtDn5UOt8JfexPiDQCLcB/s800/gakkou_isu_chair.png" alt=""><!-- 画像 -->
                    <p>タイトル</p>
                    <p>文章</p>
                  </a>
                </li>
                <li><!-- 1つのliが1つの投稿を指す -->
                  <a href="https://www.kochi-tech.ac.jp/index.html"><!-- 閲覧画面 -->
                    <img src="https://3.bp.blogspot.com/-shGNRiV5CTw/WTd4lpwf2eI/AAAAAAABEoo/bpVr6YyILvkUcFqwHtDn5UOt8JfexPiDQCLcB/s800/gakkou_isu_chair.png" alt=""><!-- 画像 -->
                    <p>タイトル</p>
                    <p>文章</p>
                  </a>
                </li>
                <li><!-- 1つのliが1つの投稿を指す -->
                  <a href="https://www.kochi-tech.ac.jp/index.html"><!-- 閲覧画面 -->
                    <img src="https://3.bp.blogspot.com/-shGNRiV5CTw/WTd4lpwf2eI/AAAAAAABEoo/bpVr6YyILvkUcFqwHtDn5UOt8JfexPiDQCLcB/s800/gakkou_isu_chair.png" alt=""><!-- 画像 -->
                    <p>タイトル</p>
                    <p>文章</p>
                  </a>
                </li>
                <li><!-- 1つのliが1つの投稿を指す -->
                  <a href="https://www.kochi-tech.ac.jp/index.html"><!-- 閲覧画面 -->
                    <img src="https://3.bp.blogspot.com/-shGNRiV5CTw/WTd4lpwf2eI/AAAAAAABEoo/bpVr6YyILvkUcFqwHtDn5UOt8JfexPiDQCLcB/s800/gakkou_isu_chair.png" alt=""><!-- 画像 -->
                    <p>タイトル</p>
                    <p>文章</p>
                  </a>
                </li>
                <li><!-- 1つのliが1つの投稿を指す -->
                  <a href="https://www.kochi-tech.ac.jp/index.html"><!-- 閲覧画面 -->
                    <img src="https://3.bp.blogspot.com/-shGNRiV5CTw/WTd4lpwf2eI/AAAAAAABEoo/bpVr6YyILvkUcFqwHtDn5UOt8JfexPiDQCLcB/s800/gakkou_isu_chair.png" alt=""><!-- 画像 -->
                    <p>タイトル</p>
                    <p>文章</p>
                  </a>
                </li>
              
              </ul>
              </div>
            

              <div class="txt-hide">
              <ul class="product-list">
              
                <li><!-- 1つのliが1つの投稿を指す -->
                  <a href="https://www.kochi-tech.ac.jp/index.html"><!-- 閲覧画面 -->
                    <img src="https://3.bp.blogspot.com/-shGNRiV5CTw/WTd4lpwf2eI/AAAAAAABEoo/bpVr6YyILvkUcFqwHtDn5UOt8JfexPiDQCLcB/s800/gakkou_isu_chair.png" alt=""><!-- 画像 -->
                    <p>タイトル</p>
                    <p>文章</p>
                  </a>
                </li>
                <li><!-- 1つのliが1つの投稿を指す -->
                  <a href="https://www.kochi-tech.ac.jp/index.html"><!-- 閲覧画面 -->
                    <img src="https://3.bp.blogspot.com/-shGNRiV5CTw/WTd4lpwf2eI/AAAAAAABEoo/bpVr6YyILvkUcFqwHtDn5UOt8JfexPiDQCLcB/s800/gakkou_isu_chair.png" alt=""><!-- 画像 -->
                    <p>タイトル</p>
                    <p>文章</p>
                  </a>
                </li>

              </ul>
              </div>
              <button class="more"></button>
                
            </div>
          </div>
          
          <div class="tabcontent" id="tabcontent2"><!-- タブフォローの中身 -->
            <h1>フォロー中</h1>
            <div class="infobox"><!-- 内部スクロール化 -->
              
              <!-- ここから1人のユーザ -->
              <div class="flex-container"><!-- 横並びのため -->
              <a href="https://www.kochi-tech.ac.jp/index.html"><!-- マイページへ -->
                  <img src="https://3.bp.blogspot.com/-shGNRiV5CTw/WTd4lpwf2eI/AAAAAAABEoo/bpVr6YyILvkUcFqwHtDn5UOt8JfexPiDQCLcB/s800/gakkou_isu_chair.png" alt="" class="imgposition"><!-- アイコン画像 -->
                ユーザ1
              </a>
                <p class="folow">
                  <a class="follow_button" href="#">
                    <span>フォロー解除</span>
                    <span>フォロー</span> 
                </a>
                </p>
              </div><br>
              
            </div>
          </div>
          
          <div class="tabcontent" id="tabcontent3"><!-- タブフォロワーの中身 -->
            <h1>フォロワー</h1>
            <div class="infobox"><!-- 内部スクロール化 -->
              
              <!-- ここから1つのユーザ -->
              <div class="flex-container">
              <a href="https://www.kochi-tech.ac.jp/index.html"><!-- マイページへ -->
                  <img src="https://3.bp.blogspot.com/-shGNRiV5CTw/WTd4lpwf2eI/AAAAAAABEoo/bpVr6YyILvkUcFqwHtDn5UOt8JfexPiDQCLcB/s800/gakkou_isu_chair.png" alt="" class="imgposition"><!-- アイコン画像 -->
                ユーザ1
              </a>
                <p class="folow">
                  <a class="follow_button" href="#">
                    <span>フォロー</span>
                    <span>フォロー解除</span> 
                  </a>
                </p>
              </div><br>
              <!-- ここまで1つのユーザ -->
              
            </div>
          </div>
          
          <div class="tabcontent" id="tabcontent4"><!-- タブいいねの中身 -->
            <div id="top" class="wrapper">

              <div class="text-show">
                <ul class="product-list">
                <li><!-- 1つのliが1つの投稿を指す -->
                  <a href="https://www.kochi-tech.ac.jp/index.html"><!-- 閲覧画面 -->
                    <img src="https://3.bp.blogspot.com/-shGNRiV5CTw/WTd4lpwf2eI/AAAAAAABEoo/bpVr6YyILvkUcFqwHtDn5UOt8JfexPiDQCLcB/s800/gakkou_isu_chair.png" alt=""><!-- 画像 -->
                    <p>タイトル</p>
                    <p>文章</p>
                  </a>
                </li>
                <li><!-- 1つのliが1つの投稿を指す -->
                  <a href="https://www.kochi-tech.ac.jp/index.html"><!-- 閲覧画面 -->
                    <img src="https://3.bp.blogspot.com/-shGNRiV5CTw/WTd4lpwf2eI/AAAAAAABEoo/bpVr6YyILvkUcFqwHtDn5UOt8JfexPiDQCLcB/s800/gakkou_isu_chair.png" alt=""><!-- 画像 -->
                    <p>タイトル</p>
                    <p>文章</p>
                  </a>
                </li>
                <li><!-- 1つのliが1つの投稿を指す -->
                  <a href="https://www.kochi-tech.ac.jp/index.html"><!-- 閲覧画面 -->
                    <img src="https://3.bp.blogspot.com/-shGNRiV5CTw/WTd4lpwf2eI/AAAAAAABEoo/bpVr6YyILvkUcFqwHtDn5UOt8JfexPiDQCLcB/s800/gakkou_isu_chair.png" alt=""><!-- 画像 -->
                    <p>タイトル</p>
                    <p>文章</p>
                  </a>
                </li>
                <li><!-- 1つのliが1つの投稿を指す -->
                  <a href="https://www.kochi-tech.ac.jp/index.html"><!-- 閲覧画面 -->
                    <img src="https://3.bp.blogspot.com/-shGNRiV5CTw/WTd4lpwf2eI/AAAAAAABEoo/bpVr6YyILvkUcFqwHtDn5UOt8JfexPiDQCLcB/s800/gakkou_isu_chair.png" alt=""><!-- 画像 -->
                    <p>タイトル</p>
                    <p>文章</p>
                  </a>
                </li>
                <li><!-- 1つのliが1つの投稿を指す -->
                  <a href="https://www.kochi-tech.ac.jp/index.html"><!-- 閲覧画面 -->
                    <img src="https://3.bp.blogspot.com/-shGNRiV5CTw/WTd4lpwf2eI/AAAAAAABEoo/bpVr6YyILvkUcFqwHtDn5UOt8JfexPiDQCLcB/s800/gakkou_isu_chair.png" alt=""><!-- 画像 -->
                    <p>タイトル</p>
                    <p>文章</p>
                  </a>
                </li>
                <li><!-- 1つのliが1つの投稿を指す -->
                  <a href="https://www.kochi-tech.ac.jp/index.html"><!-- 閲覧画面 -->
                    <img src="https://3.bp.blogspot.com/-shGNRiV5CTw/WTd4lpwf2eI/AAAAAAABEoo/bpVr6YyILvkUcFqwHtDn5UOt8JfexPiDQCLcB/s800/gakkou_isu_chair.png" alt=""><!-- 画像 -->
                    <p>タイトル</p>
                    <p>文章</p>
                  </a>
                </li>
              
              </ul>
              </div>
            

              <div class="txt-hide">
              <ul class="product-list">
              
                <li><!-- 1つのliが1つの投稿を指す -->
                  <a href="https://www.kochi-tech.ac.jp/index.html"><!-- 閲覧画面 -->
                    <img src="https://3.bp.blogspot.com/-shGNRiV5CTw/WTd4lpwf2eI/AAAAAAABEoo/bpVr6YyILvkUcFqwHtDn5UOt8JfexPiDQCLcB/s800/gakkou_isu_chair.png" alt=""><!-- 画像 -->
                    <p>タイトル</p>
                    <p>文章</p>
                  </a>
                </li>
                <li><!-- 1つのliが1つの投稿を指す -->
                  <a href="https://www.kochi-tech.ac.jp/index.html"><!-- 閲覧画面 -->
                    <img src="https://3.bp.blogspot.com/-shGNRiV5CTw/WTd4lpwf2eI/AAAAAAABEoo/bpVr6YyILvkUcFqwHtDn5UOt8JfexPiDQCLcB/s800/gakkou_isu_chair.png" alt=""><!-- 画像 -->
                    <p>タイトル</p>
                    <p>文章</p>
                  </a>
                </li>

              </ul>
              </div>
              <button class="more"></button>
            </div>
          </div>
        </div>
      </main>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="{{ asset('js/user/Mypage.js') }}"></script>
    {{--  <script src="{{ mix('js/Mypage.js') }}"></script>   --}}
      
  </body>
</html>
@endsection
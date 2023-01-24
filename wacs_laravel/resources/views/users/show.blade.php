{{ Breadcrumbs::render('mypezi') }}

@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>

    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>HOME | WACS</title>
  
      
      <!-- cssファイルの設定など -->
      <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css\bred.css')}}"> -->
      <link rel="stylesheet" type="text/css" href="{{ asset('css\user\bread_my_show.css')}}">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="{{ asset('css\thumne.css')}}">
      {{--  ハートマーク用  --}}
      <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{ asset('css\user\Mypage.css')}}">
      
      {{--  確認css  --}}
      <link rel="stylesheet" href="{{ asset('css\kakunin.css')}}">
      <link rel="stylesheet" href="{{ asset('css\ress.css')}}">
  </head>
  
  <body>
    <main class="main">
      <p class="pagetitle">マイページ</p>
      {{--  ハンバーガーなど  --}}
      <div class="box1">
        <div class="back"></div>
        <div class="mypage">             
        </div>

        {{--  ハンバーガーメニュー  --}}
        @if (auth()->user()->id === $user->id)
          <div class="hamburger-menu">
            <input type="checkbox" id="menu-btn-check">
            <label for="menu-btn-check" class="menu-btn"><span></span></label>
            <div class="menu-content">
              <ul>
                    {{--  退会  --}}
                  <li class="delete">
                    <label class="" for="pop-up"><a class="check">退会</a></label>
                    <form method="POST" action="{{ url('users/' .$user->id) }}" class="delete">
                      @csrf
                      @method('DELETE')
                        <input type="checkbox" id="pop-up">
                        <div class="overlay">
                          <div class="window">
                              <label class="close" for="pop-up">×</label>
                              <div class="text">
                                  <div style="text-align: center">
                                    <h1>
                                        確認画面                        
                                    </h1>
                                    <h4>
                                        本当に退会しますか
                                    </h4>
                                    <ul>
                                      <li class="kakunin_item">
                                        <button class="check" type="submit">退会する</button>
                                      </li>
                                    </ul>
                                  </div>
                              </div>
                          </div>
                        </div>
                    </form>
                  </li>

                  <li>
                      <a href="{{ url('users/' .$user->id .'/edit') }}" >アカウント・マイページ情報編集</a>
                  </li>
              </ul>
            </div>
          </div>
        @endif
        
      </div>
      
      {{--  ユーザ  --}}
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
            <h2 class="user-name">{{$user->user_screen_name }}</h2>
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
          <dl class="user-card-sub">
            <dd class="post-num">
              <h2>投稿</h2>
              <p class="user-text">{{$post_count}}件</p>
            </dd>

            <dd class="post-num">
              <h2>フォロー中</h2>
              <p class="user-text">{{$follow_count}}</p>
            </dd>

            <dd class="post-num">
              <h2>フォロワー</h2>
              <p class="user-text">{{$follower_count}}</p>
            </dd>
          </dl>

          {{--  フォロー  --}}
          <div class="card-follow-sub">
            @if (auth()->user()->id === $user->id)
            
            @else
              @if (auth()->user()->isFollowed($user->id))
                  <div class="px-2">
                      <p class="messege-followed">フォローされています</p>
                  </div>
              @endif
                <div class="">
                    @if (auth()->user()->isFollowing($user->id))
                        <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST" class="btn-top">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            
                            <button type="submit" class="btn-follow-sub">フォロー解除</button>
                        </form>
                    @else
                        <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
                            {{ csrf_field() }}

                            <button type="submit" class="btn-follow-sub">フォローする</button>
                        </form>
                    @endif
                </div>
            @endif
          </div>
        </div>

      </div> 
        
      {{--  タブ  --}}
      <div class="tabbox">
        {{--  タブヘッド  --}}
        <input type="radio" name="tabset" id="tabcheck1" checked><label for="tabcheck1" class="tab" id="mynav"><div class="character"><p id=vw>投稿</p></div></label>
        <input type="radio" name="tabset" id="tabcheck2"        ><label for="tabcheck2" class="tab" id="mynav"><div class="character"><p id=vw>フォロー</p></div></label>
        <input type="radio" name="tabset" id="tabcheck3"        ><label for="tabcheck3" class="tab" id="mynav"><div class="character"><p id=vw>フォロワー</p></div></label>
        <input type="radio" name="tabset" id="tabcheck4"        ><label for="tabcheck4" class="tab" id="maynav"><div class="character"><p id=vw>いいね</p></div></label>

        {{--  タブ投稿  --}}
        <div class="tabcontent" id="tabcontent1"><!-- タブ投稿の中身 -->
          <div id="top" class="wrapper">
            <div class="text-show">
              {{--  サムネイル  --}}
              <div class="container">
                <div class="row justify-content-flex-start">
                  {{--  <div class="txt-hide">  --}}
                  {{--  投稿情報  --}}
                  @if (isset($timelines))
                    @foreach ($timelines as $timeline)
                      <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">

                          <div class="flex">
                            {{--  アイコン  --}}
                            <div>
                                <a href="{{ url('users/' .$timeline->user->id) }}" class="text-secondary">
                                    {{--  <img src="./icon/50.png" width="32" height="32">  --}}
                                    @if ($timeline->user->user_icon == null)
                                        {{--  デフォルトアイコン  --}}
                                    <img src="{{asset('img/default_icon.png') }}" alt="デフォルトアイコン" class="circle-image">
                                    @else
                                        {{--  任意のアイコン  --}}
                                        <img src="{{ asset('storage/user_icon/' .$timeline->user->user_icon) }}" class="circle-image">
                                    @endif
                                </a>
                            </div> <!--アイコン画像を丸く表示-->
        
                            {{--  ユーザネーム  --}}
                            <div class="user_name">
                                <p class="mb-0">{{ $timeline->user->user_screen_name }}</p>
                            </div>

                            {{--  詳細  --}}
                            <!-- ホーム画面のサムネイルの場合には以下を通報のみにしてください。マイページのサムネイルの場合には通報以外を表示するような処理が必要です。-->
                            <div class="dropdown">
                              {{--  <button class="dropdown__btn" id="dropdown__btn1">
                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="64"/><circle cx="256" cy="448" r="64"/><circle cx="256" cy="64" r="64"/></svg>
                              </button>  --}}
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
                                    
                          {{--  投稿画像  --}}
                          <div class="img_area">
                            @if ($timeline->post_img1 == null)
                            {{--  デフォルト画像表示  --}}
                                <img src="{{asset('img/DIY.jpg') }}" class="img_position" alt="" width="300" height="200">
                            @else
                              <img src="{{ asset('storage/post_img/' .$timeline->post_img1) }}" class="img_position" alt="" width="300" height="200">
                            @endif
                          </div>
        
                          <div class="card-body">
                            {{--  投稿タイトル  --}}
                            <p class="card-text post_title">{!! nl2br(e($timeline->post_title)) !!}</p>
                            {{--  投稿説明  --}}
                            <p class="card-text post_exp">{!! nl2br(e($timeline->post_exp)) !!}</p>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ url('posts/' .$timeline->id) }}"><button type="button" class="btn btn-sm btn-outline-secondary">詳細</button></a>
                                    {{--    編集  --}}
                                    {{--  ログイン時  --}}
                                    @auth
                                        {{--  @if ($timeline->user_id == auth()->user()->id)
                                            <a href="{{ url('posts/' .$timeline->id .'/edit') }}" >
                                                <button type="button" class="btn btn-sm btn-outline-secondary">編集</button>
                                            </a>
                                        @endif  --}}
                                        {{--   いいね  --}}
                                        @if (!in_array($user->id, array_column($timeline->post_goods->toArray(), 'user_id'), TRUE))
                                            <form method="POST" action="{{ url('post_goods/') }}">
                                                @csrf

                                                <input type="hidden" name="post_id" value="{{ $timeline->id }}">
                                                <button type="submit" class="btn p-0 border-0 text-primary"><i class="far fa-heart like-btn"></i>{{ count($timeline->post_goods) }}</button>
                                            </form>
                                        @else
                                            <form method="POST" action="{{ url('post_goods/' .array_column($timeline->post_goods->toArray(), 'id', 'user_id')[$user->id]) }}" class="mb-0">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn p-0 border-0 text-danger"><i class="fas fa-heart unlike-btn"></i>{{ count($timeline->post_goods) }}</button>
                                            </form>
                                        @endif
                                    @endauth
                                              
                                    {{--  非ログイン時  --}}
                                    @guest
                                        <a href="{{ route('login') }}"><button type="button" class="btn btn-sm btn-outline-secondary">詳細</button></a>
                                        {{--  いいね  --}}
                                        {{--  <i class="far fa-heart like-btn"></i>  --}}
                                        <a href="{{ route('login') }}"<button type="submit" class="btn p-0 border-0 text-primary"><i class="far fa-heart like-btn"></i>{{ count($timeline->post_goods) }}</button>
                                    @endguest
                                  </div>
                                  <small class="text-muted">{!! nl2br(e($timeline->created_at)) !!}</small>
                            </div>
                            <div class="d-flex align-items-center"></div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  @endif
                  {{--  </div>  --}}
                </div>
              </div>
            </div>
          

                      
          </div>
        </div>
        
        {{--  タブフォロー  --}}
        <div class="tabcontent" id="tabcontent2"><!-- タブフォローの中身 -->
          <h1>フォロー中</h1>
          <div class="infobox"><!-- 内部スクロール化 -->
            @if (empty($following_ids))
              <p class="follow-message">まだフォローしていません</p>
            @else
              @foreach ($user_followings as $user_following)
                <div class="flex-container">
                  {{--  アイコン  --}}
                  <div class="card-icon">
                    <a  class="" href="{{ url('users/' .$user_following->id) }}" >
                        @if ($user_following->user_icon == null)
                            {{--  デフォルトアイコン  --}}
                        <img src="{{asset('img/default_icon.png') }}" alt="デフォルトアイコン" class="circle-image-follow">
                        @else
                            {{--  任意アイコン  --}}
                        <img src="{{ asset('storage/user_icon/' .$user_following->user_icon) }}"  class="circle-image-follow">
                        @endif
                    </a>
                  </div>

                  {{--  ユーザネーム  --}}
                  <h5>{{$user_following->user_screen_name }}</h5>

                  {{--  フォロー  --}}
                  <div class="card-follow">
                    @if (auth()->user()->id === $user_following->id)
                    
                    @else
                        @if (auth()->user()->isFollowed($user_following->id))
                            <div class="">
                                <p class="auth-followed">フォローされています</p>
                            </div>
                        @endif
                        <div class="btn-following">
                            @if (auth()->user()->isFollowing($user_following->id))
                                <form action="{{ route('unfollow', ['id' => $user_following->id]) }}" method="POST" class="btn-top">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn-follow">フォロー解除</button>
                                </form>
                            @else
                                <form action="{{ route('follow', ['id' => $user_following->id]) }}" method="POST">
                                    {{ csrf_field() }}

                                    <button type="submit" class="btn-follow">フォローする</button>
                                </form>
                            @endif
                        </div>
                      @endif
                      
                  </div>
                </div>
              @endforeach
            @endif
            
           
          </div>
        </div>
        
        {{--  タブフォロワー  --}}
        <div class="tabcontent" id="tabcontent3">
          <h1>フォロワー</h1>
          <div class="infobox"><!-- 内部スクロール化 -->
            @if (empty($follower_ids))
              <p class="follow-message">まだフォロワーはいません</p>
            @else
              @foreach ($user_followers as $user_follower)
                <div class="flex-container">
                  {{--  アイコン  --}}
                  <div class="card-icon">
                    <a  class="follow-icon" href="{{ url('users/' .$user_follower->id) }}" >
                        @if ($user_follower->user_icon == null)
                            {{--  デフォルトアイコン  --}}
                        <img src="{{asset('img/default_icon.png') }}" alt="デフォルトアイコン" class="circle-image-follow">
                        @else
                            {{--  任意アイコン  --}}
                        <img src="{{ asset('storage/user_icon/' .$user_follower->user_icon) }}"  class="circle-image-follow">
                        @endif
                    </a>
                  </div>

                  {{--  ユーザネーム  --}}
                  <h5>{{$user_follower->user_screen_name }}</h5>

                  {{--  フォロー  --}}
                  <div class="card-follow">
                    @if (auth()->user()->id === $user_follower->id)
                    
                    @else
                      @if (auth()->user()->isFollowed($user_follower->id))
                          <div class="">
                              <p class="auth-followed">フォローされています</p>
                          </div>
                      @endif
                        <div class="btn-following">
                            @if (auth()->user()->isFollowing($user_follower->id))
                                <form action="{{ route('unfollow', ['id' => $user_follower->id]) }}" method="POST" class="btn-top">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn-follow">フォロー解除</button>
                                </form>
                            @else
                                <form action="{{ route('follow', ['id' => $user_follower->id]) }}" method="POST">
                                    {{ csrf_field() }}

                                    <button type="submit" class="btn-follow">フォローする</button>
                                </form>
                            @endif
                        </div>
                      @endif
                  </div>
                </div>
              @endforeach
            @endif
            
           
          </div>
        </div>
        
        {{--  タブいいね  --}}
        <div class="tabcontent" id="tabcontent4"><!-- タブいいねの中身 -->
          <div id="top" class="wrapper">

            <div class="text-show">
              {{--  サムネイル  --}}
              <div class="container">
                <div class="row justify-content-flex-start">
                  {{--  投稿情報  --}}
                  @if (isset($timeline_goods))
                    @foreach ($timeline_goods as $timeline_good)
                      <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">

                          <div class="flex">
                            {{--  アイコン  --}}
                            <div>
                                <a href="{{ url('users/' .$timeline_good->user->id) }}" class="text-secondary">
                                    {{--  <img src="./icon/50.png" width="32" height="32">  --}}
                                    @if ($timeline_good->user->user_icon == null)
                                        {{--  デフォルトアイコン  --}}
                                    <img src="{{asset('img/default_icon.png') }}" alt="デフォルトアイコン" class="circle-image">
                                    @else
                                        {{--  任意のアイコン  --}}
                                        <img src="{{ asset('storage/user_icon/' .$timeline_good->user->user_icon) }}" class="circle-image">
                                    @endif
                                </a>
                            </div> <!--アイコン画像を丸く表示-->
        
                            {{--  ユーザネーム  --}}
                            <div class="user_name">
                                <p class="mb-0">{{ $timeline_good->user->user_screen_name }}</p>
                            </div>

                            {{--  詳細  --}}
                            <!-- ホーム画面のサムネイルの場合には以下を通報のみにしてください。マイページのサムネイルの場合には通報以外を表示するような処理が必要です。-->
                            <div class="dropdown">
                              {{--  <button class="dropdown__btn" id="dropdown__btn1">
                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="256" r="64"/><circle cx="256" cy="448" r="64"/><circle cx="256" cy="64" r="64"/></svg>
                              </button>  --}}
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
                                    
                          {{--  投稿画像  --}}
                          <div class="img_area">
                            @if ($timeline_good->post_img1 == null)
                            {{--  デフォルト画像表示  --}}
                                <img src="{{asset('img/DIY.jpg') }}" class="img_position" alt="" width="300" height="200">
                            @else
                              <img src="{{ asset('storage/post_img/' .$timeline_good->post_img1) }}" class="img_position" alt="" width="300" height="200">
                            @endif
                          </div>
        
                          <div class="card-body">
                            {{--  投稿タイトル  --}}
                            <p class="card-text post_title">{!! nl2br(e($timeline_good->post_title)) !!}</p>
                            {{--  投稿説明  --}}
                            <p class="card-text post_exp">{!! nl2br(e($timeline_good->post_exp)) !!}</p>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ url('posts/' .$timeline_good->id) }}"><button type="button" class="btn btn-sm btn-outline-secondary">詳細</button></a>
                                    {{--    編集  --}}
                                    {{--  ログイン時  --}}
                                    @auth
                                        {{--  @if ($timeline_good->user_id == auth()->user()->id)
                                            <a href="{{ url('posts/' .$timeline_good->id .'/edit') }}" >
                                                <button type="button" class="btn btn-sm btn-outline-secondary">編集</button>
                                            </a>
                                        @endif  --}}
                                        {{--   いいね  --}}
                                        @if (!in_array($user->id, array_column($timeline_good->post_goods->toArray(), 'user_id'), TRUE))
                                            <form method="POST" action="{{ url('post_goods/') }}">
                                                @csrf

                                                <input type="hidden" name="post_id" value="{{ $timeline_good->id }}">
                                                <button type="submit" class="btn p-0 border-0 text-primary"><i class="far fa-heart like-btn"></i>{{ count($timeline_good->post_goods) }}</button>
                                            </form>
                                        @else
                                            <form method="POST" action="{{ url('post_goods/' .array_column($timeline_good->post_goods->toArray(), 'id', 'user_id')[$user->id]) }}" class="mb-0">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn p-0 border-0 text-danger"><i class="fas fa-heart unlike-btn"></i>{{ count($timeline_good->post_goods) }}</button>
                                            </form>
                                        @endif
                                    @endauth
                                              
                                    {{--  非ログイン時  --}}
                                    @guest
                                        <a href="{{ route('login') }}"><button type="button" class="btn btn-sm btn-outline-secondary">詳細</button></a>
                                        {{--  いいね  --}}
                                        {{--  <i class="far fa-heart like-btn"></i>  --}}
                                        <a href="{{ route('login') }}"<button type="submit" class="btn p-0 border-0 text-primary"><i class="far fa-heart like-btn"></i>{{ count($timeline_good->post_goods) }}</button>
                                    @endguest
                                  </div>
                                  <small class="text-muted">{!! nl2br(e($timeline_good->created_at)) !!}</small>
                            </div>
                            <div class="d-flex align-items-center"></div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  @endif
                </div>
              </div>
            </div>
          
            {{--  <div class="txt-hide">
              
            </div>
            <button class="more"></button>  --}}
          </div>
        </div>
      </div>
    </main>

    {{--  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="{{ asset('js/user/Mypage.js') }}"></script>  --}}
    {{--  <script src="{{ mix('js/Mypage.js') }}"></script>   --}}
      
  </body>
</html>
@endsection

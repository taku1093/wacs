
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HOME | WACS</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <!-- cssファイルの設定など -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css\thumne.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css\DIY_home.css')}}">
  {{--  ハートマーク用  --}}
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  {{--  <link rel="stylesheet" href="{{ asset('./css/headder_fotter.css') }}">  --}}
</head>
@extends('layouts.app')

@section('content')
{{--  ページタイトル  --}}
<p class="pagetitle">DIY HOME</p>
<div class="container">
  <p class="">TIME LINE</p>

  <div class="row justify-content-center">

      {{--  投稿情報  --}}
      {{--  <p class="">TIME LINE</p>  --}}
      @if (isset($timelines))
          @foreach ($timelines as $timeline)
                      <div class="col-md-4">
                          <div class="card mb-4 shadow-sm">
  
                          <div class="flex">
                              {{--  アイコン  --}}
                              <div>
                                  {{--  <img src="./icon/50.png" width="32" height="32">  --}}
                                  @if ($timeline->user->user_icon == null)
                                      {{--  デフォルトアイコン  --}}
                                  <img src="{{asset('img/default_icon.png') }}" alt="デフォルトアイコン" class="circle-image">
                                  @else
                                      {{--  任意のアイコン  --}}
                                      <img src="{{ asset('storage/user_icon/' .$timeline->user->user_icon) }}" class="circle-image">
                                  @endif
                              </div> <!--アイコン画像を丸く表示-->

                              {{--  ユーザネーム  --}}
                              <div class="user_name">
                                  <p class="mb-0">{{ $timeline->user->user_screen_name }}</p>
                              </div>
  
                              {{--  詳細  --}}
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
                          
                          {{--  投稿画像  --}}
                          <div class="img_area">
                              @if ($timeline->post_img1 == null)
                              {{--  デフォルト画像表示  --}}
                                  <img src="./img/DIY.jpg" class="img_position" alt="" width="300" height="200">
                              @else
                              <img src="{{ asset('storage/post_img/' .$timeline->post_img1) }}" class="img_position" alt="" width="300" height="200">
                              @endif

                          </div>
  
                          <div class="card-body">
                              {{--  投稿タイトル  --}}
                              <p class="card-text">{!! nl2br(e($timeline->post_title)) !!}</p>
                              {{--  投稿説明  --}}
                              <p class="card-text">{!! nl2br(e($timeline->post_exp)) !!}</p>

                              <div class="d-flex justify-content-between align-items-center">
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-sm btn-outline-secondary">見る</button>
                                      @if ($timeline->user_id == auth()->user()->id)
                                          {{--  <a href="{{ url('posts/create') }}"><button type="button" class="btn btn-sm btn-outline-secondary">編集</button></a>  --}}
                                          <a href="{{ url('Posts/' .$timeline->id .'/edit') }}"><button type="button" class="btn btn-sm btn-outline-secondary">編集</button></a>
                                      @endif

                                      {{--   いいね  --}}
                                      @if (!in_array($user->id, array_column($timeline->post_goods->toArray(), 'user_id'), TRUE))
                                      <form method="POST" action="{{ url('post_goods/') }}">
                                          @csrf

                                          <input type="hidden" name="post_id" value="{{ $timeline->id }}">
                                          <button type="submit" class="btn p-0 border-0 text-primary"><i class="far fa-heart like-btn"></i></button>
                                      </form>

                                      @else
                                      <form method="POST" action="{{ url('post_goods/' .array_column($timeline->post_goods->toArray(), 'id', 'user_id')[$user->id]) }}" class="mb-0">
                                          @csrf
                                          @method('DELETE')

                                          <button type="submit" class="btn p-0 border-0 text-danger"><i class="fas fa-heart unlike-btn"></i></button>
                                      </form>

                                      @endif
                                      <p class="mb-0 text-secondary">{{ count($timeline->post_goods) }}</p>

                                  </div>
                                <small class="text-muted">{!! nl2br(e($timeline->created_at)) !!}</small>
                              </div>
                              <div class="d-flex align-items-center"></div>
                          </div>
                        </div>
                      </div>
          @endforeach
      @endif
      {{--  もっと見る  --}}
      <a href="{{ url('posts') }}"><button class="styled-button_p" type="button">もっと見る</button></a>
  </div>

  
  



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
});
</script>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js" integrity="sha384-Qg00WFl9r0Xr6rUqNLv1ffTSSKEFFCDCKVyHZ+sVt8KuvG99nWw5RNvbhuKgif9z" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</div>


@endsection
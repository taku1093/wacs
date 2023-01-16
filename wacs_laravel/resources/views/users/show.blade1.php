@extends('layouts.app')

@section('content')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOME | WACS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- cssファイルの設定など -->
    {{--  <link rel="stylesheet" type="text/css" href="{{ asset('css\thumne.css')}}">  --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css\user\show.css')}}">
    {{--  ハートマーク用  --}}
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    {{--  <link rel="stylesheet" href="{{ asset('./css/headder_fotter.css') }}">  --}}
</head>
<p class="pagetitle">投稿詳細</p>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <div class="card">
                <div class="d-inline-flex">
                    <div class="p-3 d-flex flex-column">
                        <img src="{{ asset('storage/user_icon/' .$user->user_icon) }}" class="rounded-circle" width="100" height="100">
                        <div class="mt-3 d-flex flex-column">
                            <h4 class="mb-0 font-weight-bold">{{ $user->user_screen_name }}</h4>
                            <span class="text-secondary">{{ $user->screen_name }}</span>
                        </div>
                    </div>
                    <div class="p-3 d-flex flex-column justify-content-between">
                        <div class="d-flex">
                            <div>
                                {{--  自身のマイページ  --}}
                                @if ($user->id === Auth::user()->id)
                                    <a href="{{ url('users/' .$user->id .'/edit') }}" class="btn btn-primary">プロフィールを編集する</a>
                                @else
                                {{--  他ユーザマイページ  --}}
                                    @if ($is_following)
                                        <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger">フォロー解除</button>
                                        </form>
                                    @else
                                        <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
                                            {{ csrf_field() }}

                                            <button type="submit" class="btn btn-primary">フォローする</button>
                                        </form>
                                    @endif
                                    
                                    
                                    @if ($is_followed)
                                        <span class="mt-2 px-1 bg-secondary text-light">フォローされています</span>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="p-2 d-flex flex-column align-items-center">
                                <p class="font-weight-bold">ツイート数</p>
                                <span>{{ $post_count }}</span>
                            </div>
                            <div class="p-2 d-flex flex-column align-items-center">
                                <p class="font-weight-bold">フォロー数</p>
                                <span>{{ $follow_count }}</span>
                            </div>
                            <div class="p-2 d-flex flex-column align-items-center">
                                <p class="font-weight-bold">フォロワー数</p>
                                <span>{{ $follower_count }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--  投稿関連  --}}
        {{--  @extends('thumbnail')
        @section('thumbnail')  --}}


        @if (isset($is_good))
            @foreach ($is_good as $is_good)
                
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">

                            <div class="flex">
                                {{--  アイコン  --}}
                                <div>
                                    <a href="{{ url('users/' .$is_good->user->id) }}" class="text-secondary">
                                        {{--  <img src="./icon/50.png" width="32" height="32">  --}}
                                        @if ($is_good->user->user_icon == null)
                                            {{--  デフォルトアイコン  --}}
                                        <img src="{{asset('img/default_icon.png') }}" alt="デフォルトアイコン" class="circle-image">
                                        @else
                                            {{--  任意のアイコン  --}}
                                            <img src="{{ asset('storage/user_icon/' .$is_good->user->user_icon) }}" class="circle-image">
                                        @endif
                                    </a>
                                </div> <!--アイコン画像を丸く表示-->

                                {{--  ユーザネーム  --}}
                                <div class="user_name">
                                    <p class="mb-0">{{ $is_good->user->user_screen_name }}</p>
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
                                @if ($is_good->post_img1 == null)
                                {{--  デフォルト画像表示  --}}
                                    <img src="{{asset('img/DIY.jpg') }}" class="img_position" alt="" width="300" height="200">
                                @else
                                <img src="{{ asset('storage/post_img/' .$is_good->post_img1) }}" class="img_position" alt="" width="300" height="200">
                                @endif

                            </div>

                            <div class="card-body">
                                {{--  投稿タイトル  --}}
                                <p class="card-text post_title">{!! nl2br(e($is_good->post_title)) !!}</p>
                                {{--  投稿説明  --}}
                                <p class="card-text post_exp">{!! nl2br(e($is_good->post_exp)) !!}</p>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ url('posts/' .$is_good->id) }}"><button type="button" class="btn btn-sm btn-outline-secondary">詳細</button></a>
                                        {{--    編集  --}}
                                        {{--  ログイン時  --}}
                                        @auth
                                            @if ($is_good->user_id == auth()->user()->id)
                                                {{--  <a href="{{ url('posts/' .$is_good->id .'/edit') }"><button type="button" class="btn btn-sm btn-outline-secondary">編集</button></a>  --}}
                                                <a href="{{ url('posts/' .$is_good->id .'/edit') }}" >
                                                    <button type="button" class="btn btn-sm btn-outline-secondary">編集</button>
                                                </a>
                                            @endif
                                            {{--   いいね  --}}
                                            @if (!in_array($user->id, array_column($is_good->post_goods->toArray(), 'user_id'), TRUE))
                                                <form method="POST" action="{{ url('post_goods/') }}">
                                                    @csrf

                                                    <input type="hidden" name="post_id" value="{{ $is_good->id }}">
                                                    <button type="submit" class="btn p-0 border-0 text-primary"><i class="far fa-heart like-btn"></i>{{ count($is_good->post_goods) }}</button>
                                                </form>
                                            @else
                                                <form method="POST" action="{{ url('post_goods/' .array_column($is_good->post_goods->toArray(), 'id', 'user_id')[$user->id]) }}" class="mb-0">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn p-0 border-0 text-danger"><i class="fas fa-heart unlike-btn"></i>{{ count($is_good->post_goods) }}</button>
                                                </form>
                                            @endif
                                        @endauth
                                                
                                        {{--  非ログイン時  --}}
                                        @guest
                                            <a href="{{ route('login') }}"><button type="button" class="btn btn-sm btn-outline-secondary">詳細</button></a>
                                            {{--  いいね  --}}
                                            {{--  <i class="far fa-heart like-btn"></i>  --}}
                                            <a href="{{ route('login') }}"<button type="submit" class="btn p-0 border-0 text-primary"><i class="far fa-heart like-btn"></i>{{ count($is_good->post_goods) }}</button>
                                        @endguest
                                        

                                    </div>
                                <small class="text-muted">{!! nl2br(e($is_good->created_at)) !!}</small>
                                </div>
                                <div class="d-flex align-items-center"></div>
                            </div>
                        </div>
                        </div>
            @endforeach
        @endif
    </div>
    <div class="my-4 d-flex justify-content-center">
        {{ $timelines->links() }}
    </div>
</div>



@endsection
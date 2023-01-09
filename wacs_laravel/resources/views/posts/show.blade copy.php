@extends('layouts.app')

@section('content')


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投稿詳細</title>
    {{--  css  --}}
    
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link href="{{ asset('css/post/show.css') }}" rel="stylesheet" type="text/css">  
    {{--  ハートマーク用  --}}
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<body>
    <p class="pagetitle">投稿詳細</p>
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8 mb-3">
                <div class="card">

                    {{--  投稿画像  --}}
                    <div class="card-img">
                        @if ($post->post_img1 === null)
                            <img class="post_img" src="{{ asset('storage/DIY.jpg') }}" >
                        @else
                            <img class="post_img" src="{{ asset('storage/post_img/' .$post->post_img1) }}" >

                            @if ($post->post_img2 === null)
                                <img class="post_img" src="{{ asset('storage/DIY.jpg') }}" >
                            @else
                                <img class="post_img" src="{{ asset('storage/post_img/' .$post->post_img2) }}" >
                            @endif

                            @if ($post->post_img3 === null)
                                <img class="post_img" src="{{ asset('storage/DIY.jpg') }}" >
                            @else
                                <img class="post_img" src="{{ asset('storage/post_img/' .$post->post_img3) }}" >
                            @endif
                        @endif
                    </div>
                    
                    <dl class="card-main">
                        <dt class="card-user">
                            {{--  投稿ユーザ情報  --}}
                            <div class="user_info">

                                {{--  ユーザアイコン  --}}
                                <div class="card-icon">
                                    <a  class="" href="#" >
                                        @if ($post->user->user_icon == null)
                                            {{--  デフォルトアイコン  --}}
                                        <img src="{{asset('img/default_icon.png') }}" alt="デフォルトアイコン" class="circle-image">
                                        @else
                                            {{--  任意アイコン  --}}
                                        <img src="{{ asset('storage/user_icon/' .$post->user->user_icon) }}"  class="circle-image">
                                        @endif
                                    </a>
                                </div>

                                {{--  ユーザーネーム  --}}
                                <div class="card-user_name">
                                    <p>{{$post->user->user_screen_name }}</p>
                                </div>

                                {{--  他ユーザからの評価  --}}
                                <div class="card-user_evaluation">
                                    <p>他ユーザからの評価</p>
                                    @foreach ($eval_results as $eval_results)
                                        @if($post->user->id === $eval_results->user_id)
                                            <p>{{round($eval_results->eval_ave,1)}}</p>

                                            {{--  確認用  --}}
                                            {{--  <p>{{$eval_results->eval_ave}}</p>  --}}
                                        @endif
                                    @endforeach
                                    
                                </div>

                                {{--  投稿数  --}}
                                <div class="card-post_num">
                                        <p>
                                            投稿数
                                            @foreach ($post_count as $post_count)
                                                @if($post->user->id === $post_count->user_id)
                                                    {{$post_count->count_post}}

                                                    {{--  確認用  --}}
                                                    {{--  <p>{{$post_count}}</p>  --}}
                                                @endif
                                            @endforeach
                                            件
                                        </p>
                                </div>

                                {{--  フォロー  --}}
                                <div class="card-follow">
                                    @if (auth()->user()->isFollowed($post->user->id))
                                        <div class="px-2">
                                            <span class="px-1 bg-secondary text-light">フォローされています</span>
                                        </div>
                                    @endif
                                    <div class="d-flex justify-content-end flex-grow-1">
                                        @if (auth()->user()->isFollowing($post->user->id))
                                            <form action="{{ route('unfollow', ['id' => $post->user->id]) }}" method="POST" class="btn-top">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn-follow">フォロー解除</button>
                                            </form>
                                        @else
                                            <form action="{{ route('follow', ['id' => $post->user->id]) }}" method="POST">
                                                {{ csrf_field() }}

                                                <button type="submit" class="btn-follow">フォローする</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </dt>

                        <dd class="card-post">
                            {{--  投稿情報  --}}
                            <div class="post_info"> 
                                {{--  タイトル・いいね  --}}
                                <div class="card-header">
                                    <dl class="post-header">
                                        {{--  投稿タイトル  --}}
                                        <dt class="title"><h1 class="mb-0">{{ $post->post_title }}</h1></dt>
                                        {{--   いいね  --}}
                                        <dd class="post_good">
                                            @auth
                                            {{--  いいねあり  --}}
                                                @if (!in_array($user->id, array_column($post->post_goods->toArray(), 'user_id'), TRUE))
                                                    <form method="POST" action="{{ url('post_goods/') }}">
                                                        @csrf

                                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                        <button type="submit" class="good-btn p-0 border-0 text-primary"><i class="far fa-heart like-btn"></i></button>
                                                        ×{{count($post->post_goods) }}
                                                    </form>
                                                @else
                                            {{--  いいねなし  --}}
                                                    <form method="POST" action="{{ url('post_goods/' .array_column($post->post_goods->toArray(), 'id', 'user_id')[$user->id]) }}" class="mb-0">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="good-btn p-0 border-0 text-danger"><i class="fas fa-heart unlike-btn"></i></button>
                                                        ×{{count($post->post_goods) }}
                                                    </form>
                                                @endif
                                            @endauth
                                                    
                                            {{--  非ログイン時  --}}
                                            @guest
                                                <a href="{{ route('login') }}"><button type="button" class="btn btn-sm btn-outline-secondary">編集</button></a>
                                                <i class="far fa-heart like-btn"></i>
                                            @endguest
                                            
                                        </dd>
                                        
                                    </dl>
                                </div>

                                {{--  投稿説明  --}}
                                <div class="card-exp">
                                    <h2>[説明]</h2>
                                    <p class="mb-0">{{ $post->post_exp }}</p>
                                </div>

                                {{--  投稿材料  --}}
                                <div  class="card-material">
                                    <dl class="material-body">
                                        @if (isset($material))
                                            @foreach ($material as $material)
                                                {{--  材料  --}}
                                                <dt class="material"><h2>[材料]</h2></dt>
                                                <dd class="material_num"><h2>[数量]</h2></dd>

                                                <dt class="material">{{ $material->material_name1 }}</dt>
                                                <dd class="material_num">{{ $material->material_num1 }}</dd>

                                                <dt class="material">{{ $material->material_name2 }}</dt>
                                                <dd class="material_num">{{ $material->material_num2 }}</dd>

                                                <dt class="material">{{ $material->material_name3 }}</dt>
                                                <dd class="material_num">{{ $material->material_num3 }}</dd>

                                                <dt class="material">{{ $material->material_name4 }}</dt>
                                                <dd class="material_num">{{ $material->material_num4 }}</dd>

                                                <dt class="material">{{ $material->material_name5 }}</dt>
                                                <dd class="material_num">{{ $material->material_num5 }}</dd>

                                                <dt class="material">{{ $material->material_name6 }}</dt>
                                                <dd class="material_num">{{ $material->material_num6 }}</dd>

                                                <dt class="material">{{ $material->material_name7 }}</dt>
                                                <dd class="material_num">{{ $material->material_num7 }}</dd>

                                                <dt class="material">{{ $material->material_name8 }}</dt>
                                                <dd class="material_num">{{ $material->material_num8 }}</dd>

                                                <dt class="material">{{ $material->material_name9 }}</dt>
                                                <dd class="material_num">{{ $material->material_num9 }}</dd>

                                                <dt class="material">{{ $material->material_name10 }}</dt>
                                                <dd class="material_num">{{ $material->material_num10 }}</dd>
                                            @endforeach
                                        @endif
                                    </dl>
                                </div>
                                
                                {{--  作り方  --}}
                                <div class="card-method">
                                    <h2>[作り方]</h2>
                                    <p class="mb-0">{{ $post->method }}</p>
                                </div>
                                
                                {{--  投稿道具  --}}
                                <div class="card-tool">
                                    @if (isset($post->tools))
                                        @foreach ($post->tools as $post->tools)
                                            <h2>[道具]</h2>
                                            <p class="tool">{{ $post->tools->tool_name1 }}</p>
                                            <p class="tool">{{ $post->tools->tool_name2 }}</p>
                                            <p class="tool">{{ $post->tools->tool_name3 }}</p>
                                            <p class="tool">{{ $post->tools->tool_name4 }}</p>
                                            <p class="tool">{{ $post->tools->tool_name5 }}</p>
                                            <p class="tool">{{ $post->tools->tool_name6 }}</p>
                                            <p class="tool">{{ $post->tools->tool_name7 }}</p>
                                            <p class="tool">{{ $post->tools->tool_name8 }}</p>
                                            <p class="tool">{{ $post->tools->tool_name9 }}</p>
                                            <p class="tool">{{ $post->tools->tool_name10 }}</p>
                                        @endforeach
                                    @endif
                                    
                                </div>

                                {{--  コメント  --}}
                                <div class="card-comment">
                                    <h2>コメント</h2>

                                    {{--  コメント入力  --}}
                                    <div class="comment-header">
                                        <form method="POST" action="{{ route('comments.store') }}">
                                            @csrf

                                            {{--  新規コメントテキスト  --}}
                                            <div class="comment-input">
                                                {{-- コメントユーザ --}}
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">

                                                {{--  コメント入力エリア  --}}
                                                <input id="comment_text" class="input-text validate[required,maxSize[16]]" type="text" name="comment_text" placeholder="コメントする"  value="{{ old('comment_text') }}">

                                                {{--  送信ボタン --}}
                                                <button type="submit" class="btn-comment">送信</button>

                                                {{--  エラー  --}}
                                                @error('comment_text')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </form>
                                    </div>

                                    {{--  コメント情報  --}}
                                    <div class="comment-area">
                                        <ul class="comment-list">
                                            @forelse ($comments as $comment)
                                                <li class="list-group-item">
                                                    {{--  コメントユーザ情報  --}}
                                                    <div class="comment-user">          
                                                        <dl class="comment-layout">
                                                            {{--  コメントユーザアイコン  --}}
                                                            <dt class="comment-layout">
                                                                <div class="comment-icon">
                                                                    <a  class="" href="#" >
                                                                        @if ($comment->user->user_icon == null)
                                                                            {{--  デフォルトアイコン  --}}
                                                                        <img src="{{asset('img/default_icon.png') }}" alt="デフォルトアイコン" class="circle-image">
                                                                        @else
                                                                            {{--  任意アイコン  --}}
                                                                        <img src="{{ asset('storage/user_icon/' .$comment->user->user_icon) }}"  class="circle-image">
                                                                        @endif
                                                                    </a>
                                                                </div>
                                                            </dt>

                                                            {{--  コメントユーザ情報  --}}
                                                            <dd class="comment-layout">
                                                                <div class="comment-layout-info">
                                                                    {{--  コメントユーザ  --}}
                                                                    <p class="comment-user_name">{{ $comment->user->user_screen_name }}</p>
                                                                    
                                                                    {{--  投稿コメント  --}}
                                                                    <p class="comment-post_text">{!! nl2br(e($comment->comment_text)) !!}</p>
                                                                
                                                                    {{--   いいね  --}}
                                                                    <dd class="comment_good">
                                                                        @auth
                                                                            @if (!in_array($user->id, array_column($comment->comment_goods->toArray(), 'user_id'), TRUE))
                                                                                <form class="comment_good" method="POST" action="{{ url('comment_goods/') }}">
                                                                                    @csrf

                                                                                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                                                                    <button type="submit" class="good-btn p-0 border-0 text-primary"><i class="far fa-heart like-btn"></i></button>
                                                                                    ×{{count($comment->comment_goods) }}
                                                                                </form>
                                                                            @else
                                                                                <form class="comment_good" method="POST" action="{{ url('comment_goods/' .array_column($comment->comment_goods->toArray(), 'id', 'user_id')[$user->id]) }}" class="mb-0">
                                                                                    @csrf
                                                                                    @method('DELETE')

                                                                                    <button type="submit" class="good-btn p-0 border-0 text-danger"><i class="fas fa-heart unlike-btn"></i></button>
                                                                                    ×{{count($comment->comment_goods) }}
                                                                                </form>
                                                                            @endif
                                                                        @endauth
                                                                                
                                                                        @guest
                                                                            <a href="{{ route('login') }}"><button type="button" class="btn btn-sm btn-outline-secondary">編集</button></a>
                                                                            <i class="far fa-heart like-btn"></i>
                                                                        @endguest
                                                                        
                                                                    </dd>
                                                                    
                                                                </div>
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                </li>

                                            {{--  コメント0件  --}}
                                            @empty
                                                <li class="list-group-item">
                                                    <p class="mb-0 text-secondary">コメントはまだありません。</p>
                                                </li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </dd>

                    </dl>   

                </div>
            </div>
        </div>
    </div>
    

    

    {{--  javascript  --}}
    
</body>
</html>
@endsection
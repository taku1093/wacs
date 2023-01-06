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
                        @if ($post->post_img1 == null)
                            <img src="{{ asset('storage/DIY.jpg') }}" >
                        @else
                            <ul class="slider">
                                <li><img src="{{ asset('storage/post_img/' .$post->post_img1) }}" ></li>
                                @if ($post->post_img2 == null)
                                    <img src="{{ asset('storage/DIY.jpg') }}" >
                                @else
                                    <li><img src="{{ asset('storage/post_img/' .$post->post_img2) }}" ></li>
                                @endif
                                @if ($post->post_img3 == null)
                                    <img src="{{ asset('storage/DIY.jpg') }}" >
                                @else
                                    <li><img src="{{ asset('storage/post_img/' .$post->post_img3) }}" ></li>
                                @endif
                            </ul>
                        @endif
                    </div>
                    
                    <dl class="card-main">
                        <dt>
                            {{--  投稿ユーザ情報  --}}
                            <div class="card-user">

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
                                            <form action="{{ route('unfollow', ['id' => $post->user->id]) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">フォロー解除</button>
                                            </form>
                                        @else
                                            <form action="{{ route('follow', ['id' => $post->user->id]) }}" method="POST">
                                                {{ csrf_field() }}

                                                <button type="submit" class="btn btn-primary">フォローする</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </dt>

                        <dd>
                            {{--  投稿情報  --}}
                            <div class="card-body">
                                    {{--  タイトル・いいね  --}}
                                    <div class="card-header">
                                        <dl>
                                            {{--  投稿タイトル  --}}
                                            <dt class="mb-0">{{ $post->post_title }}</dt>
                                            {{--   いいね  --}}
                                            <dd>
                                                @auth
                                                    @if (!in_array($user->id, array_column($post->post_goods->toArray(), 'user_id'), TRUE))
                                                        <form method="POST" action="{{ url('post_goods/') }}">
                                                            @csrf

                                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                            <button type="submit" class="btn p-0 border-0 text-primary"><i class="far fa-heart like-btn"></i></button>
                                                        </form>
                                                    @else
                                                        <form method="POST" action="{{ url('post_goods/' .array_column($post->post_goods->toArray(), 'id', 'user_id')[$post->user->id]) }}" class="mb-0">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn p-0 border-0 text-danger"><i class="fas fa-heart unlike-btn"></i></button>
                                                        </form>
                                                    @endif
                                                @endauth
                                                        
                                                {{--  非ログイン時  --}}
                                                @guest
                                                    <a href="{{ route('login') }}"><button type="button" class="btn btn-sm btn-outline-secondary">編集</button></a>
                                                    <i class="far fa-heart like-btn"></i>
                                                @endguest
                                                {{--  いいね数  --}}
                                                <p class="mb-0 text-secondary">{{ count($post->post_goods) }}</p>
                                            </dd>
                                        </dl>
                                    </div>

                                    {{--  投稿説明  --}}
                                    <div class="card-exp">
                                        <h2>[説明]</h2>
                                        <p class="mb-0">{{ $post->post_exp }}</p>
                                    </div>

                                    {{--  投稿材料  --}}
                                    <dl class="card-material">
                                        @if (isset($material))
                                            @foreach ($material as $material)
                                                {{--  材料  --}}
                                                <dt><h2>[材料]</h2></dt>
                                                <dd><h2>[数量]</h2></dd>

                                                <dt>{{ $material->material_name1 }}</dt>
                                                <dd>{{ $material->material_num1 }}</dd>

                                                <dt>{{ $material->material_name2 }}</dt>
                                                <dd>{{ $material->material_num2 }}</dd>

                                                <dt>{{ $material->material_name3 }}</dt>
                                                <dd>{{ $material->material_num3 }}</dd>

                                                <dt>{{ $material->material_name4 }}</dt>
                                                <dd>{{ $material->material_num4 }}</dd>

                                                <dt>{{ $material->material_name5 }}</dt>
                                                <dd>{{ $material->material_num5 }}</dd>

                                                <dt>{{ $material->material_name6 }}</dt>
                                                <dd>{{ $material->material_num6 }}</dd>

                                                <dt>{{ $material->material_name7 }}</dt>
                                                <dd>{{ $material->material_num7 }}</dd>

                                                <dt>{{ $material->material_name8 }}</dt>
                                                <dd>{{ $material->material_num8 }}</dd>

                                                <dt>{{ $material->material_name9 }}</dt>
                                                <dd>{{ $material->material_num9 }}</dd>

                                                <dt>{{ $material->material_name10 }}</dt>
                                                <dd>{{ $material->material_num10 }}</dd>
                                            @endforeach
                                        @endif
                                    </dl>
                                    
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
                                                <p class="mb-0">{{ $post->tools->tool_name1 }}</p>
                                                <p class="mb-0">{{ $post->tools->tool_name2 }}</p>
                                                <p class="mb-0">{{ $post->tools->tool_name3 }}</p>
                                                <p class="mb-0">{{ $post->tools->tool_name4 }}</p>
                                                <p class="mb-0">{{ $post->tools->tool_name5 }}</p>
                                                <p class="mb-0">{{ $post->tools->tool_name6 }}</p>
                                                <p class="mb-0">{{ $post->tools->tool_name7 }}</p>
                                                <p class="mb-0">{{ $post->tools->tool_name8 }}</p>
                                                <p class="mb-0">{{ $post->tools->tool_name9 }}</p>
                                                <p class="mb-0">{{ $post->tools->tool_name10 }}</p>
                                            @endforeach
                                        @endif
                                        
                                    </div>

                                    {{--  コメント  --}}
                                    <div class="card-comment">
                                        <h2>コメント</h2>
                                    </div>
                            </div>
                        </dd>

                    </dl>   

                </div>
            </div>
        </div>
    </div>
    

    

    {{--  javascript  --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!--自作のJS-->
    <script src="{{ asset('js/post/show.js') }}" type="text/javascript"></script>  
</body>
</html>
@endsection
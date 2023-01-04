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
                            <img src="./img/DIY.jpg" >
                        @else
                            <ul class="slider">
                                <li><img src="{{ asset('storage/post_img/' .$post->post_img1) }}" ></li>
                                <li><img src="{{ asset('storage/post_img/' .$post->post_img2) }}" ></li>
                                <li><img src="{{ asset('storage/post_img/' .$post->post_img3) }}" ></li>
                            </ul>
                        @endif
                    </div>

                    {{--  投稿ユーザ情報  --}}
                    <div class="card-user">
                        
                        {{--  ユーザアイコン  --}}
                        <div class="card-icon">
                            <a  class="" href="#" >
                                @if (auth()->user()->user_icon == null)
                                    {{--  デフォルトアイコン  --}}
                                <img src="{{asset('img/default_icon.png') }}" alt="デフォルトアイコン" class="circle-image">
                                @else
                                    {{--  任意アイコン  --}}
                                <img src="{{ asset('storage/user_icon/' .auth()->user()->user_icon) }}"  class="circle-image">
                                @endif
                            </a>
                        </div>

                        {{--  ユーザーネーム  --}}
                        <div class="card-user_name">
                            <p>{{$user->user_screen_name }}</p>
                        </div>

                        {{--  他ユーザからの評価  --}}
                        <div class="card-user_evalution">
                            <p>他ユーザからの評価</p>
                        </div>

                        {{--  投稿数  --}}
                        <div class="card-post_num">
                            <p>投稿数</p>
                        </div>

                        {{--  フォロー  --}}
                        <div class="card-follow">
                            <p>他ユーザからの評価</p>
                        </div>
                    </div>

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
                                                <form method="POST" action="{{ url('post_goods/' .array_column($post->post_goods->toArray(), 'id', 'user_id')[$user->id]) }}" class="mb-0">
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
                                        <dd>×{{ $material->material_num1 }}</dd>

                                        <dt>{{ $material->material_name2 }}</dt>
                                        <dd>×{{ $material->material_num2 }}</dd>

                                        <dt>{{ $material->material_name3 }}</dt>
                                        <dd>×{{ $material->material_num3 }}</dd>

                                        <dt>{{ $material->material_name4 }}</dt>
                                        <dd>×{{ $material->material_num4 }}</dd>

                                        <dt>{{ $material->material_name5 }}</dt>
                                        <dd>×{{ $material->material_num5 }}</dd>

                                        <dt>{{ $material->material_name6 }}</dt>
                                        <dd>×{{ $material->material_num6 }}</dd>

                                        <dt>{{ $material->material_name7 }}</dt>
                                        <dd>×{{ $material->material_num7 }}</dd>

                                        <dt>{{ $material->material_name8 }}</dt>
                                        <dd>×{{ $material->material_num8 }}</dd>

                                        <dt>{{ $material->material_name9 }}</dt>
                                        <dd>×{{ $material->material_num9 }}</dd>

                                        <dt>{{ $material->material_name10 }}</dt>
                                        <dd>×{{ $material->material_num10 }}</dd>
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
                                @if (isset($tool))
                                    @foreach ($tool as $tool)
                                        <h2>[道具]</h2>
                                        <ul>
                                            <li>{{ $tool->tool_name1 }}</li>
                                            <li>{{ $tool->tool_name2 }}</li>
                                            <li>{{ $tool->tool_name3 }}</li>
                                            <li>{{ $tool->tool_name4 }}</li>
                                            <li>{{ $tool->tool_name5 }}</li>
                                            <li>{{ $tool->tool_name6 }}</li>
                                            <li>{{ $tool->tool_name7 }}</li>
                                            <li>{{ $tool->tool_name8 }}</li>
                                            <li>{{ $tool->tool_name9 }}</li>
                                            <li>{{ $tool->tool_name10 }}</li>
                                        </ul>
                                    @endforeach
                                @endif
                            </div>

                            {{--  コメント  --}}
                            <div class="card-comment">
                            </div>
                    </div>

                        



                    {{--  <div class="card-footer py-1 d-flex justify-content-end bg-white">
                        @if ($post->user->id === Auth::user()->id)
                            <div class="dropdown mr-3 d-flex align-items-center">
                                <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-fw"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <form method="POST" action="{{ url('tweets/' .$post->id) }}" class="mb-0">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ url('tweets/' .$post->id .'/edit') }}" class="dropdown-item">編集</a>
                                        <button type="submit" class="dropdown-item del-btn">削除</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>  --}}
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
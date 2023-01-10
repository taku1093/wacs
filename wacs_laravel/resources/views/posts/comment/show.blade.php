@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投稿詳細</title>
    
    {{--  css  --}}
    
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link href="{{ asset('css/post/comment/show.css') }}" rel="stylesheet" type="text/css">  
    {{--  ハートマーク用  --}}
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<body>
    {{--  投稿コメント  --}}
    <h2 class="pagetitle">コメント</h2>
    <div class="comment-area">
        {{--  コメントユーザ情報  --}}
        <div class="comment-user">  
                {{-- コメント投稿情報   --}}
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

                {{--  コメント情報  --}}
                <dd class="comment-layout">
                    <div id="comment-layout-info">
                        {{--  コメントユーザ  --}}
                        <p class="comment-user_name">{{ $comment->user->user_screen_name }}</p>
                        
                        {{--  投稿コメント  --}}
                        <p class="comment-post_text">{!! nl2br(e($comment->comment_text)) !!}</p>

                    </div>
                </dd>

                {{--   いいね情報  --}}
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
            </dl>
        </div>
        {{--  新規コメントテキスト  --}}
        <div class="comment-input">
            <h2 class="reply">[返信]</h2>
            <form method="POST" action="{{ route('replies.store') }}">
                @csrf
                {{-- コメントユーザ --}}
                <input type="hidden" name="comment_id" value="{{ $comment->id }}">

                {{--  コメント入力エリア  --}}
                <input id="reply_text" class="input-text validate[required,maxSize[16]]" type="text" name="reply_text" placeholder="返信する"  value="{{ old('reply_text') }}">

                {{--  送信ボタン --}}
                <div class="button-comment">
                    <button type="submit" class="btn-comment">送信</button>
                </div>
                {{--  エラー  --}}
                @error('reply_text')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </form>
        </div>

        {{--  返信コメント  --}}
        <div class="reply-area">
            <h2 class="reply">[返信コメント]</h2>
            <ul class="reply-list ">
                @forelse ($replies as $reply)
                    <li class="list-group-item">
                        {{--  コメントユーザ情報  --}}
                        <div class="reply-user">  
                                {{-- コメント投稿情報   --}}
                            <dl class="reply-layout">
                                {{--  コメントユーザアイコン  --}}
                                <dt class="reply-layout">
                                    <div class="reply-icon">
                                        <a  class="" href="#" >
                                            @if ($reply->user->user_icon == null)
                                                {{--  デフォルトアイコン  --}}
                                            <img src="{{asset('img/default_icon.png') }}" alt="デフォルトアイコン" class="circle-image">
                                            @else
                                                {{--  任意アイコン  --}}
                                            <img src="{{ asset('storage/user_icon/' .$reply->user->user_icon) }}"  class="circle-image">
                                            @endif
                                        </a>
                                    </div>
                                </dt>

                                {{--  コメント情報  --}}
                                <dd class="reply-layout">
                                    <div id="reply-layout-info">
                                        {{--  コメントユーザ  --}}
                                        <p class="reply-user_name">{{ $reply->user->user_screen_name }}</p>
                                        
                                        {{--  投稿コメント  --}}
                                        <p class="reply-post_text">{!! nl2br(e($reply->reply_text)) !!}</p>
                                    
                                    </div>
                                </dd>

                            
                                {{--   いいね情報  --}}
                                <dd class="reply-good">
                                    @auth
                                        @if (!in_array($user->id, array_column($reply->reply_goods->toArray(), 'user_id'), TRUE))
                                            <form class="reply_good" method="POST" action="{{ url('reply_goods/') }}">
                                                @csrf

                                                <input type="hidden" name="reply_id" value="{{ $reply->id }}">
                                                <button type="submit" class="good-btn p-0 border-0 text-primary"><i class="far fa-heart like-btn"></i></button>
                                                ×{{count($reply->reply_goods) }}
                                            </form>
                                        @else
                                            <form class="reply_good" method="POST" action="{{ url('reply_goods/' .array_column($reply->reply_goods->toArray(), 'id', 'user_id')[$user->id]) }}" class="mb-0">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="good-btn p-0 border-0 text-danger"><i class="fas fa-heart unlike-btn"></i></button>
                                                ×{{count($reply->reply_goods) }}
                                            </form>
                                        @endif
                                    @endauth
                                            
                                    @guest
                                        <a href="{{ route('login') }}"><button type="button" class="btn btn-sm btn-outline-secondary"></button></a>
                                        <i class="far fa-heart like-btn"></i>
                                    @endguest
                                </dd>

                            </dl>
                            
                        </div>
                    </li>
                
                {{--  返信0件  --}}
                @empty
                    <li class="list-group-item">
                        <p class="mb-0 text-secondary">返信はまだありません。</p>
                    </li>
                @endforelse
        
            </ul>
        </div>
    </div>
</body>
</html>
@endsection
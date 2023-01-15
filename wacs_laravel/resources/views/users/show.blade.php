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
        @extends('thumbnail')
        @section('thumbnail')
    </div>
    <div class="my-4 d-flex justify-content-center">
        {{ $timelines->links() }}
    </div>
</div>



@endsection
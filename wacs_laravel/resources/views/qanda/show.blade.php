@extends('layouts.qandalayout')
 
@section('title', 'LaravelPjt Q&A 投稿の詳細ページ')
@section('keywords', 'キーワード1,キーワード2,キーワード3')
@section('description', '投稿詳細ページの説明文')
@section('pageCss')
<link href="/css/qanda/style.css" rel="stylesheet">
@endsection
 
{{--  @include('layouts.qandaheader')
 
@section('content')  --}}

@extends('layouts.app')

@section('content')

<div class="container mt-4">  

    <div class="border p-4">

        <!-- <div class="mb-4 text-right">
            <a href="{{ action('QapostsController@edit', $qapost->id) }}" class="btn btn-info">
            編集する
            </a>
        </div> -->
        <div class="mb-4 text-right">
            <a href="{{ action('QapostsController@edit', $qapost->id) }}" class="btn btn-info">
            編集する
            </a>
            
            <form
                style="display: inline-block;"
                method="POST"
                action="{{ action('QapostsController@destroy', $qapost->id) }}"
            >
            @csrf
            @method('DELETE')
            
            <button class="btn btn-danger">削除する</button>
            </form>
        </div>

        <!-- 件名 -->
        <h1 class="h4 mb-4">
            {{ $qapost->subject }}
        </h1>
 
        <!-- 投稿情報 -->
        <div class="summary">
            <p><span>{{ $qapost->name }}</span> / <time>{{ $qapost->updated_at->format('Y.m.d H:i') }}</time> / {{ $qapost->qacategory->name }} / {{ $qapost->id }}</p>
        </div>
 
        <!-- 本文 -->
        <p class="mb-5">
            {!! nl2br(e($qapost->message)) !!}
        </p>
 
        <section>
            <h2 class="h5 mb-4">
                コメント
            </h2>

            <!-- コメントフォーム -->
            <form class="mb-4" method="POST" action="{{ route('qacomment.store') }}">
                @csrf
            
                <input
                    name="qapost_id"
                    type="hidden"
                    value="{{ $qapost->id }}"
                >
            
                <div class="form-group">
                    <label for="subject">
                    名前
                    </label>
            
            <input
                id="name"
                name="name"
                class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                value="{{ old('name') }}"
                type="text"
            >
                    @if ($errors->has('name'))
                    <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                    </div>
                    @endif
                </div>
            
                <div class="form-group">
                <label for="body">
                本文
                </label>
            
                    <textarea
                        id="qacomment"
                        name="qacomment"
                        class="form-control {{ $errors->has('qacomment') ? 'is-invalid' : '' }}"
                        rows="4"
                    >{{ old('qacomment') }}</textarea>
                    @if ($errors->has('qacomment'))
                    <div class="invalid-feedback">
                    {{ $errors->first('qacomment') }}
                    </div>
                    @endif
                </div>
            
                <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                コメントする
                </button>
                </div>
            </form>
            
            @if (session('commentstatus'))
                <div class="alert alert-success mt-4 mb-4">
                {{ session('commentstatus') }}
                </div>
            @endif
            <!-- コメントフォームここまで -->


 
            @forelse($qapost->qacomments as $qacomment)
                <div class="border-top p-4">
                    <time class="text-secondary">
                        {{ $qacomment->name }} / 
                        {{ $qacomment->created_at->format('Y.m.d H:i') }} / 
                        {{ $qacomment->id }}
                    </time>
                    <p class="mt-2">
                        {!! nl2br(e($qacomment->qacomment)) !!}
                    </p>
                </div>
            @empty
                <p>コメントはまだありません。</p>
            @endforelse
        </section>
    </div>
</div>

<div class="mt-4 mb-4">
    <a href="{{ route('qanda.index') }}" class="btn btn-info">
        一覧に戻る
    </a>
</div>
@endsection
 
{{--  @include('layouts.qandafooter')  --}}
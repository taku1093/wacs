{{ Breadcrumbs::render('QA') }}

@extends('layouts.app')


 
{{--  @include('layouts.qandaheader')
 
@section('content')  --}}


@section('content')

<header>
    <link rel="stylesheet" type="text/css" href="{{ asset('css\qanda\index.css')}}">
</header>
{{--  ページタイトル  --}}
<p class="pagetitle">Q&A</p>

<div class="container">

    <div class="mt-4 mb-4">
        <a href="{{ route('qanda.create') }}" class="btn btn-primary">
            投稿の新規作成
        </a>
    </div>

    <!-- 検索フォーム -->
    <div class="mt-4 mb-4">
        <form class="form-inline" method="GET" action="{{ route('qanda.index') }}">
            <div class="form-group">
                <input type="text" name="searchword" value="{{$searchword}}" class="form-control" placeholder="名前を入力してください">
            </div>
            <input type="submit" value="検索" class="btn btn-info ml-2">
        </form>
    </div>

    <div class="mt-4 mb-4">
        <p>{{ $qaposts->total() }}件が見つかりました。</p>
    </div>

    <div class="mt-4 mb-4">
        @foreach($qacategories as $id => $name)
        <span class="btn"><a href="{{ route('qanda.index', ['qacategory_id'=>$id]) }}" title="{{ $name }}">{{ $name }}</a></span>
        @endforeach
    </div>

    <!-- フラッシュメッセージ用の処理 -->
    @if (session('poststatus'))
        <div class="alert alert-success mt-4 mb-4">
            {{ session('poststatus') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>カテゴリ</th>
                <th>作成日時</th>
                <th>名前</th>
                <th>件名</th>
                <th>メッセージ</th>
                <th>処理</th>
            </tr>
            </thead>
            <tbody id="tbl">
            @foreach ($qaposts as $qapost)
                <tr>
                    <td>{{ $qapost->id }}</td>
                    <td>{{ $qapost->qacategory->name }}</td>
                    <td>{{ $qapost->created_at->format('Y.m.d') }}</td>
                    <td>{{ $qapost->name }}</td>
                    <td>{{ $qapost->subject }}</td>
                    <td>{!! nl2br(e(Str::limit($qapost->message, 100))) !!}
                    @if ($qapost->qacomments->count() >= 1)
                        <p><span class="badge badge-primary">コメント：{{ $qapost->qacomments->count() }}件</span></p>
                    @endif
                    </td>
                    <td class="text-nowrap">
                        <!-- <p><a href="" class="btn btn-primary btn-sm">詳細</a></p> -->
                        <p><a href="{{ action('QapostsController@show', $qapost->id) }}" class="btn btn-primary btn-sm">詳細</a></p>
                        <!-- <p><a href="" class="btn btn-info btn-sm">編集</a></p> -->
                        <p><a href="{{ action('QapostsController@edit', $qapost->id) }}" class="btn btn-info btn-sm">編集</a></p>
                        <!-- <p><a href="" class="btn btn-danger btn-sm">削除</a></p> -->
                        <p>
                            <form method="POST" action="{{ action('QapostsController@destroy', $qapost->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">削除</button>
                            </form>
                        </p>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- ページネーション -->
    <!-- <div class="d-flex justify-content-center mb-5">
        {{ $qaposts->links() }}
    </div> -->
    <div class="d-flex justify-content-center mb-5">
        {{ $qaposts->appends([
            'qacategory_id' => $qacategory_id,
            'searchword' => $searchword,
        ])->links() }}
    </div>
</div>
@endsection
 
{{--  @include('layouts.qandafooter')  --}}
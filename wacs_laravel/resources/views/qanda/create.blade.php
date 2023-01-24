{{ Breadcrumbs::render('QA_create') }}

@extends('layouts.app')

@section('content')

<header>
    <link rel="stylesheet" href="{{asset('css\app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css\bred.css')}}">
    <link rel="stylesheet" href="{{asset('css\qanda\create.css')}}">
    <title>Q&A新規質問作成 | WACS</title>
</header>

<div class="container mt-4">
    <div class="border p-4">
        <h1 class="h4 mb-4 font-weight-bold">
            投稿の新規作成
        </h1>
 
        <form method="POST" action="{{ route('qanda.store') }}">
            @csrf
 
            <fieldset class="mb-4">
 
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
                    <label for="subject">
                        カテゴリー
                    </label>
                    <!-- <input
                        id="qacategory_id"
                        name="qacategory_id"
                        class="form-control {{ $errors->has('qacategory_id') ? 'is-invalid' : '' }}"
                        value="{{ old('qacategory_id') }}"
                        type="text"
                    > -->
                    <select 
                        id="qacategory_id"
                        name="qacategory_id"
                        class="form-control {{ $errors->has('qacategory_id') ? 'is-invalid' : '' }}"
                        value="{{ old('qacategory_id') }}"
                    >
                    @foreach($qacategories as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                    </select>

                    @if ($errors->has('qacategory_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('qacategory_id') }}
                        </div>
                    @endif
                </div>
 
                <div class="form-group">
                    <label for="subject">
                        件名
                    </label>
                    <input
                        id="subject"
                        name="subject"
                        class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}"
                        value="{{ old('subject') }}"
                        type="text"
                    >
                    @if ($errors->has('subject'))
                        <div class="invalid-feedback">
                            {{ $errors->first('subject') }}
                        </div>
                    @endif
                </div>
 
                <div class="form-group">
                    <label for="message">
                        メッセージ
                    </label>
 
                    <textarea
                        id="message"
                        name="message"
                        class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}"
                        rows="4"
                    >{{ old('message') }}</textarea>
                    @if ($errors->has('message'))
                        <div class="invalid-feedback">
                            {{ $errors->first('message') }}
                        </div>
                    @endif
                </div>
 
                <div class="mt-5">
                    <a class="btn btn-secondary" href="{{ route('qanda.index') }}">
                        キャンセル
                    </a>
 
                    <button type="submit" class="btn btn-primary">
                        投稿する
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection
 
{{--  @include('layouts.qandafooter')  --}}
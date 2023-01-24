{{ Breadcrumbs::render('QA_edit') }}
@extends('layouts.app')

@section('content')

<header>
    <link rel="stylesheet" href="{{asset('css\app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css\bred.css')}}">
    <link rel="stylesheet" href="{{asset('css\qanda\edit.css')}}">
    <title>Q&A編集 | WACS</title>
</header>

<div class="container mt-4">
    <div class="border p-4">
        <h1 class="h4 mb-4 font-weight-bold">
            投稿の編集
        </h1>
 
        <form method="POST" action="{{ route('qanda.update', $qapost->id) }}">
            @csrf
            @method('PUT')
 
            <fieldset class="mb-4">
                <div class="form-group">
                    <label for="subject">
                        名前
                    </label>
                    <input
                        id="name"
                        name="name"
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        value="{{ old('name') ?: $qapost->name }}"
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
                        value="{{ old('qacategory_id') ?: $qapost->qacategory_id }}"
                        type="text"
                    > -->
                    <select 
                        id="qacategory_id"
                        name="qacategory_id"
                        class="form-control {{ $errors->has('qacategory_id') ? 'is-invalid' : '' }}"
                    >
                        @foreach($qacategories as $id => $name)
                            <option value="{{ $id }}" 
                                @if ($qapost->qacategory_id == $id) 
                                    selected
                                @endif
                            >{{ $name }}</option>
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
                        value="{{ old('subject') ?: $qapost->subject }}"
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
                    >{{ old('message') ?: $qapost->message }}</textarea>
                    @if ($errors->has('message'))
                        <div class="invalid-feedback">
                            {{ $errors->first('message') }}
                        </div>
                    @endif
                </div>
 
                <div class="mt-5">
                    <a class="btn btn-secondary" href="{{ route('qanda.show', $qapost->id) }}">
                        キャンセル
                    </a>
 
                    <button type="submit" class="btn btn-primary">
                        編集する
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection
 
{{--  @include('layouts.qandafooter')  --}}
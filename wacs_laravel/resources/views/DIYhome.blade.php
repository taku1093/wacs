

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOME | WACS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- cssファイルの設定など -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css\thumne.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css\DIY_home.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css\bred.css')}}">
    {{--  ハートマーク用  --}}
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    
    {{--  <link rel="stylesheet" href="{{ asset('./css/headder_fotter.css') }}">  --}}
</head>
@extends('layouts.app')

@section('content')

{{ Breadcrumbs::render('DIY_home') }}

{{--  ページタイトル  --}}
<p class="pagetitle">DIY HOME</p>
<div class="container">
    <p class="sub_title">TIME LINE</p>

    @extends('thumbnail')
    @section('thumbnail')
    <a href="{{ url('posts') }}"><button class="styled-button_p" type="button">もっと見る</button></a>
    {{--  @endsection  --}}
        {{--  もっと見る  --}}
</div>







@endsection
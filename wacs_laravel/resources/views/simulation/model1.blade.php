@extends('layouts.app')
@section('content')

<!-- <model-viewer>を使って、3Dを、WEBサイトに埋め込む例 -->
    <!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/sim_model.css') }}">
        <meta charset="utf-8">
    </head>
  
    <body>
    <!-- コンポーネントをCDNで読み込む -->
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js"></script>
    
    <!-- 3Dモデルを読み込む。
    "exposure"は露出の制御、明るさが変わる。
    "auto-rotate"は自動的に回転表示。
    poster="hoge.png"は、3Dが読み込まれるまで、画像のhoge.pngを表示する設定-->
    <h2 class="pagetitle">四角い椅子</h2>

    <model-viewer 
      ar
      ar-modes="scene-viewer webxr quick-look"
      id="reveal" 
      class="main" 
      loading="eager" 
      camera-controls 
      auto-rotate 
      poster="hoge.png" 
      src="{{ asset('img/simulation/sikakuisu.gltf') }}"  
      exposure="0.6" 
      alt="" >
    </model-viewer>

    {{--  投稿情報  --}}
      <div class="model-info"> 
          {{--  タイトル・いいね  --}}
          <div class="card-header">
              <dl class="post-header">
                  {{--  投稿タイトル  --}}
                  <dt class="title"><h1 class="mb-0">タイトル</h1></dt>
              </dl>
          </div>

          {{--  投稿説明  --}}
          <div class="card-exp">
              <h2>[説明]</h2>
              <p class="mb-0"></p>
          </div>

          {{--  投稿材料  --}}
          <div  class="card-material">
              <h2>[材料]</h2></dt>
              <p class="mb-0"></p>

          </div>
          
          {{--  作り方  --}}
          <div class="card-method">
              <h2>[作り方]</h2>
              <p class="mb-0"></p>
          </div>
          
          {{--  投稿道具  --}}
          <div class="card-tool">
            <h2>[道具]</h2>
          </div>

          
      </div>


    </body>
    </html>
    @endsection
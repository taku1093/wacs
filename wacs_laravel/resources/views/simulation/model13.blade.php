{{ Breadcrumbs::render('simulation_model') }}

@extends('layouts.app')
@section('content')

<!-- <model-viewer>を使って、3Dを、WEBサイトに埋め込む例 -->
    <!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/css/modaal.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/sim_model.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css\bred.css')}}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1"> <!-- レスポンシブデザイン  -->
        <!-- <link rel="stylesheet" type="text/css" href="css/9-6-3.css"> -->
    </head>
  
    <body>
    <!-- コンポーネントをCDNで読み込む -->
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js"></script>
    
    <!-- 3Dモデルを読み込む。
    "exposure"は露出の制御、明るさが変わる。
    "auto-rotate"は自動的に回転表示。
    poster="hoge.png"は、3Dが読み込まれるまで、画像のhoge.pngを表示する設定-->
    <h2 class="pagetitle">モデル</h2>

    <model-viewer 
      ar
      ar-modes="scene-viewer webxr quick-look"
      id="reveal" 
      class="main" 
      loading="eager" 
      camera-controls 
      auto-rotate 
      poster="hoge.png" 
      src="{{ asset('img/simulation/IKEA.gltf') }}"  
      exposure="0.6" 
      alt="" >
    </model-viewer>

    <!--1. テキストを含む一般的なモーダル-->
    <!-- <ul class="info-list">
        <li> -->
        <div class="info-list">
            <a href="#info-1" class="info"><!--リンク先は表示させたいエリアのid名を指定-->
                 <div class="AR_position"><button class="AR-button" type="button">AR</button></div>
            </a>
        </div>
        <!-- </li>
    </ul> -->
    <section id="info-1" class="hide-area"><!--表示エリアのHTML。id名にリンク先と同じ名前を指定。非表示にするためhide-areaというクラス名も指定。-->
        <h2 class="AR_title">AR用QRコード</h2>
        <p class="AR_exp">以下のQRコードをスマートフォンで読み込んでください。</p>
    <img class="QRcode" src="{{ asset('img/simulation/sikakuisuQR.png') }}" alt="QRコード">
    </section>

    {{--  投稿情報  --}}
      <div class="model-info"> 
          {{--  タイトル・いいね  --}}
          <div class="card-header">
              <dl class="post-header">
                  {{--  投稿タイトル  --}}
                  <dt class="title"><h2 class="mb-0 res-mb-0">カウンターチェア</h2></dt>
              </dl>
          </div>

          {{--  投稿説明  --}}
          <div class="card-exp">
              <h2>[説明]</h2>
              <p class="mb-0">カウンターバーがある人におすすめです。また、通常の椅子よりも
                高いのです。
              </p>
          </div>

          {{--  投稿材料  --}}
          <div  class="card-material">
              <h2>[材料]</h2></dt>
              <p class="mb-0">木板、鉄棒</p>

          </div>
          
          {{--  作り方  --}}
          <div class="card-method">
              <h2>[作り方]</h2>
              <p class="mb-0">
                木板を切断し、200mm×200mmのものと、長さ2700mmのものを4本、長さ180mmのものを3本用意し、200mm×200mmの木材の真ん中に長さ10cm程度の穴をあける。
                写真のように組み立てをすれば完成！
              </p>
          </div>
          
          {{--  投稿道具  --}}
          <div class="card-tool">
            <h2>[道具]</h2>
            <p class="mb-0">
                ・のこぎり<br>
                ・インパクトドライバー<br>
                ・定規<br>
                ・電動糸のこぎり
            </p>
          </div>

          
      </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/js/modaal.min.js"></script>
    <!--自作のJS-->
    <script src="{{ asset('js/model_modaal.js') }}"></script>

    </body>
    </html>
    @endsection
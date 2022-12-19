<!-- <model-viewer>を使って、3Dを、WEBサイトに埋め込む例 -->
    <!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
        <link rel="stylesheet" type="text/css" href="sim_slide_test.css">
        <meta charset="utf-8">
        
    </head>
  
    <body>
  
    <!-- CSSで表示サイズや、背景色を指定する -->
    <style>
       /*メイン表示のモデル設定 */
    model-viewer.main {
      width: 1000px;
      height: 600px;
      background-color: #918f91;
      margin: 0 auto;
    }
  
    model-viewer#reveal {
        --poster-color: transparent;
    }
  
    </style>
    <!-- コンポーネントをCDNで読み込む -->
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js"></script>
    
    <!-- 3Dモデルを読み込む。
    "exposure"は露出の制御、明るさが変わる。
    "auto-rotate"は自動的に回転表示。
    poster="hoge.png"は、3Dが読み込まれるまで、画像のhoge.pngを表示する設定-->
    <model-viewer 
      ar
      ar-modes="scene-viewer webxr quick-look"
      id="reveal" 
      class="main" 
      loading="eager" 
      camera-controls 
      auto-rotate 
      poster="hoge.png" 
      src="./img/simulation/sikakuisu.gltf"  
      exposure="0.6" 
      alt="" >
  </model-viewer>
  
    </body>
    </html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TOP | WACS</title>
        <meta name="description" content="ページの概要文を記述します">
        <meta name="viewport" content="width=device-width"> <!-- スマホ表示用 -->
        <script src="./js/toggle-menu.js"></script>
        <link href="./css/top_test.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    </head>
    <body>
        <header class="header">
            <div class="header-inner"> <!--スマホ表示時にスタイリングしやすくするためのもの-->
                <a class="header-logo" href="{{route('top')}}"> <!--ロゴにトップページのリンクを貼る-->
                    <img src="./img/logo_header.png" alt="WACS">
                </a>
                <button class="toggle-menu-button"></button> <!--スマホ用のメニューボタンの設定-->
                <div class="header-site-menu"> <!--ナビゲーションエリアの設定-->
                    <nav class="site-menu">
                        <ul>
                            <li><a href="./ranking.html" id="navline">ランキング</a></li>
                            <li><a href="./simulation.html" id="navline">シミュレーション</a></li>
                            <li><a href="./rental.html" id="navline">レンタル</a></li>
                            <li><a href="./community.html" id="navline">Q ＆ A</a></li>
                            <li><a href="{{route('contact')}}"><button class="styled-button" type="button">お問い合わせ</button></a></li>
                            <li><a href="{{route('login')}}"><button class="styled-button" type="button">ログイン</button></a></li>
                        </ul>
                    </nav>
                </div> 
            </div> 

        </header>
        <main class="main">

        </main>
        <footer class="footer">
            <nav class="site-menu">
                <ul>
                    <li><a href="./ranking.html">ランキング</a></li>
                    <li><a href="./simulation.html">シミュレーション</a></li>
                    <li><a href="./rental.html">レンタル</a></li>
                    <li><a href="./community.html">Q ＆ A</a></li>
                </ul>
            </nav>
            <a class="footer-logo" href="{{route('top')}}">
                <img src="./img/logo_header.png" alt="WACS">
            </a>
            <p class="footer-tel"></p>
            <p class="footer-name"></p>
            <p class="copyright"><small>Copyright &copy; 2022 LA Inc. All Rights Reserved.</small></p>
        </footer>
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--  <title>{{ config('app.name', 'Laravel') }}</title>  --}}

    <!-- Scripts -->
    {{--  <script src="{{ asset('js/app.js') }}" defer></script>  --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    {{--  <link rel="stylesheet" type="text/css" href="./css/headder_fotter.css">  --}}
    <link rel="stylesheet" href="{{ asset('./css/headder_fotter.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">

</head>
<body>
    <header class="header">
    <div class="header-inner">
                <a class="header-logo" href="{{ url('/') }}">
                    <img src="{{ asset('./img/logo_header.png') }}" alt="WACS"> {{-- WACSのロゴ --}}
                </a>

                <nav class="site-menu">
                    
                    <!-- Right Side Of Navbar -->
                    <ul>
                        <!-- Authentication Links -->
                        {{--  非ログイン時表示  --}}
                        @guest
                            <li><a href="{{ route('contact') }}"><button class="styled-button" type="button">お問い合わせ</button></a></li>
                            <li class="nav-item">
                                <a href="{{ route('login') }}"><button class="styled-button" type="button">ログイン</button></a>
                            </li>
                        @else
                        @if (Request::is('/'))  
                        {{--  wacsトップ画面  --}}
                            <li><a href="{{ url('posts/create') }}"><button class="styled-button" type="button">ツイートする</button></a></li>
                            <li><a href="{{ route('contact') }}"><button class="styled-button" type="button">お問い合わせ</button></a></li> 
                        @else 
                            {{--  ログイン時表示  --}}                            
                            <li><a href="./ranking.html" id="navline">ランキング</a></li>
                            <li><a href="{{ route('simulation') }}" id="navline">シミュレーション</a></li>
                            <li><a href="./rental.html" id="navline">レンタル</a></li>
                            <li><a href="./community.html" id="navline">Q & A</a></li>
                            <li><a href="{{ route('contact') }}"><button class="styled-button" type="button">お問い合わせ</button></a></li> 
                            <li><a href="{{ url('posts/create') }}"><button class="styled-button" type="button">ツイートする</button></a></li>
                        @endif
                            {{--  アカウント  --}}
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if (auth()->user()->user_icon == null)
                                        {{--  デフォルトアイコン  --}}
                                    <img src="{{asset('img/default_icon.png') }}" alt="デフォルトアイコン" width="50" height="50">
                                    @else
                                    
                                    <img src="{{ asset('storage/user_icon/' .auth()->user()->user_icon) }}"  width="50" height="50">
                                    @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </nav>
            </div>
    </header>

        <main class="py-4">
            @yield('content')
        </main>

        {{--  url判定  --}}
        @if (Request::is('login'))  
        @else  
            <footer class="footer">
                @if (Route::has('login'))
                    <nav class="site-menu">
                        @auth
                            <ul>
                                <li><a href="./ranking.html" id="">ランキング</a></li>
                                <li><a href="{{ route('simulation') }}" id="">シミュレーション</a></li>
                                <li><a href="./rental.html" id="">レンタル</a></li>
                                <li><a href="./community.html" id="">Q & A</a></li>
                            </ul>
                        @else
                        @endauth
                    </nav>
                @endif
                <a class="footer-logo" href="{{ url('/') }}">
                    <img src="{{ asset('./img/logo_header.png') }}" alt="WACS">
                </a>
                <p class="footer-tel"></p>
                <p class="footer-name"></p>
                <p class="copyright"><small>Copyright &copy; 2022 LA Inc. All Rights Reserved.</small></p>
            </footer>
        @endif
    </div>
</body>
</html>

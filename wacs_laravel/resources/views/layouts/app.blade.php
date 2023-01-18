<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/logout.js') }}" type="text/javascript"></script>

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
    {{--  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">  --}}
    <link rel="stylesheet" href="{{ asset('./css/headder_fotter.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">

</head>
<body>
    <header class="header">
    <div class="header-inner">
                <a class="header-logo" href="{{ url('/') }}">
                    <img class="hf-img"class="logo" src="{{ asset('./img/logo_header.png') }}" alt="WACS"> {{-- WACSのロゴ --}}
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
                            <li><a href="{{ route('contact') }}"><button class="styled-button" type="button">お問い合わせ</button></a></li> 
                            <li><a href="{{ url('posts/create') }}"><button class="styled-button_t" type="button">新規投稿</button></a></li>
                            {{--  <li><a href="{{ url('posts') }}"><button class="styled-button_t" type="button">ツイート一覧</button></a></li>  --}}
                        
                        @else 
                            {{--  ログイン時表示  --}}
                            <li><a href="{{ route('DIY_home') }}" id="navline">ホーム</a></li>
                            <li><a href="./ranking.html" id="navline">ランキング</a></li>
                            <li><a href="{{ route('simulation') }}" id="navline">シミュレーション</a></li>
                            <!-- <li><a href="./rental.html" id="navline">レンタル</a></li> -->
                            <li><a href="{{ url('qanda') }}" id="navline">Q & A</a></li>
                            <li><a href="{{ route('contact') }}"><button class="styled-button" type="button">お問い合わせ</button></a></li> 
                            <li><a href="{{ url('posts/create') }}"><button class="styled-button_t" type="button">新規投稿</button></a></li>
                        @endif
                            {{--  アカウント  --}}
                            <li class="nav-item ">
                                <a  class=" " href="{{ url('users/' .auth()->user()->id) }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if (auth()->user()->user_icon == null)
                                        {{--  デフォルトアイコン  --}}
                                    <img class="hf-img"src="{{asset('img/default_icon.png') }}" alt="デフォルトアイコン" width="50" height="50">
                                    @else
                                    
                                    <img class="hf-img"src="{{ asset('storage/user_icon/' .auth()->user()->user_icon) }}"  width="50" height="50">
                                    @endif
                                </a>
                            </li>

                                <!--div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                
                                </div-->

                            <li class="dropdown">
                                <button class="dropdown__btn-logout" id="dropdown__button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
                                </button>
                                <div class="dropdown__body">
                                    <ul class="dropdown__list">
                                        <li class="dropdown__item">
                                            <a class="dropdown__item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('ログアウト') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                            </form>
                                        </li>
                                    </ul>
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
                            @if (Request::is('/')) 
                            @else 
                            <ul>
                                <li><a href="{{ route('DIY_home') }}" id="navline">ホーム</a></li>
                                <li><a href="./ranking.html" id="navline">ランキング</a></li>
                                <li><a href="{{ route('simulation') }}" id="navline">シミュレーション</a></li>
                                <!-- <li><a href="./rental.html" id="navline">レンタル</a></li> -->
                                <li><a href="{{ url('qanda') }}" id="navline">Q & A</a></li>
                            </ul>
                            @endif
                        @endauth
                    </nav>
                @endif
                <a class="footer-logo" href="{{ url('/') }}">
                    <img class="hf-img"class="icon" src="{{ asset('./img/logo_header.png') }}" alt="WACS">
                </a>
                <p class="footer-tel"></p>
                <p class="footer-name"></p>
                <p class="copyright"><small>Copyright &copy; 2022 LA Inc. All Rights Reserved.</small></p>
            </footer>
        @endif
    </div>
</body>
</html>

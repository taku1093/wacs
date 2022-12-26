@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>アカウント登録 | WACS</title>
    <meta name="description" content="アカウントページです。">
    <meta name="viewport" content="width=device-width"> <!-- スマホ表示用 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/post/create.js') }}" type="text/javascript"></script>
    <link href="./common.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/post/create.css') }}" rel="stylesheet">
    

    {{--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.min.css" type="text/css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery-1.8.2.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-ja.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js" type="text/javascript" charset="utf-8"></script>
    <!-- 1行目は、jQuery-Validation-Engineのスタイルシートを読み込んでいます。
    2行目は、jQuery本体を読み込んでいます。既に別の用途でjQuery本体を読み込み済みなら、この記述は省略して下さい。
    3行目は、jQuery-Validation-Engineの日本語化スクリプトを読み込んでいます。エラーメッセージを日本語で表示させたい場合に必要です。
    4行目は、jQuery-Validation-Engineの本体スクリプトを読み込んでいます。 -->
    
    <script type="text/javascript">
        jQuery(document).ready(function(){
        jQuery("#accountform").validationEngine();
        });
    </script>  --}}

    
</head>

<body>

    <main>
        <div class="post_create">
            <form id="post_creat_form" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <dl class="form-area">
                    {{--  <div class="col-md-12 p-3 w-100 d-flex">
                    @if (auth()->user()->user_icon == null)
                        {{--  デフォルトアイコン  
                    <img src="{{asset('img/default_icon.png') }}" alt="デフォルトアイコン" width="50" height="50">
                    @else
                        {{--  任意のアイコン  
                    <img src="{{ asset('storage/user_icon/' .auth()->user()->user_icon) }}"  width="50" height="50">
                    @endif
                        <div class="ml-2 d-flex flex-column">
                            <p class="mb-0">{{ $user->user_screen_name }}</p>
                            <a href="{{ url('users/' .$user->id) }}" class="post_exp-secondary">{{ $user->screen_name }}</a>
                        </div>
                    </div>  --}}

                    {{--  投稿画像  --}}
                    {{--  <table>
                        <thead>
                            <tr>
                                <th>画像</th>
                            </tr>
                        </thead>
                        {{--  <tr><span class="required">画像を選択</span></tr>  
                        <tbody>
                            <tr>
                                <td>
                                    {{--  <img src="{{ asset('public/storage/post_img/' .$post->post_img) }}"  width="80" height="80" alt="post_img">  
                                    <div id="view_1"></div>
                                    <input type="file" id="file_1" name="post_img1" accept="image/*" autocomplete="post_img">
                                </td>
                            </tr>
                        </tbody>

                        <tfoot>
                            <tr>
                                <td>
                                    <button id="add" type="button">追加</button><span id="reload"></span>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <span id="message"></span>  --}}
                    

                    
                        {{--  <tr><span class="required">画像を選択</span></tr>  --}}
                        
                    {{--  <img src="{{ asset('public/storage/post_img/' .$post->post_img) }}"  width="80" height="80" alt="post_img">  --}}
                    
                    <dt><span id="addbutton">画像選択</span>
                        <span id="reload"><button id="add" type="button">+ 追加</button></span>
                        <br>
                            <span id="message"></span>
                        </br>
                    </dt>
                        <dd id="img" class="border_line">
                            <div id="view_1"></div>
                            <input type="file" id="file_1" name="post_img1" accept="image/*" autocomplete="post_img">
                            
                        </dd>
                    
                    {{--  タイトル  --}}
                    <dt><span class="required">投稿タイトル</span></dt>
                    <dd class="border_line"><input id="post_title" class="input-text validate[required,maxSize[16]]" type="text" name="post_title" placeholder="投稿のタイトル"  value="{{ old('post_title') }}"></dd>

                    {{--  タイトル  --}}
                    <dt><span class="required">投稿説明</span></dt>
                    <dd class="border_line"><input id="post_exp" class="input-text validate[required,maxSize[16]]" type="text" name="post_exp" placeholder="投稿の説明"  value="{{ old('post_exp') }}"></dd>

                    {{--  材料  --}}
                    <dt>
                        <span id="addbutton">材料</span>
                        <span id="reload"><button id="add_material" type="button">+ 追加</button></span>
                        <br>
                            <span id="message_material"></span>
                        </br>
                    </dt>

                    <dd id="material" class="border_line">
                        <div class="material_text">● <input id="material_name1" class="input-text validate[required,maxSize[16]]" type="text" name="material_name1" placeholder="材料"  value="{{ old('material') }}"></div>
                    </dd>

                    {{--  道具  --}}
                    <dt>
                        <span id="addbutton">道具</span>
                        <span id="reload"><button id="add_tool" type="button">+ 追加</button></span>
                        <br>
                            <span id="message_tool"></span>
                        </br>
                    </dt>

                    <dd id="tool" class="border_line">
                        <div class="tool_text">● <input id="tool" class="input-text validate[required,maxSize[16]]" type="text" name="tool" placeholder="道具"  value="{{ old('tool') }}"></div>
                    </dd>

                    {{--  作り方  --}}
                    <dt><span class="required">作り方</span></dt>
                    <dd class="border_line">
                        <textarea class="method" name="method" required autocomplete="method" rows="5">
                            {{ old('method') }}
                        </textarea>
                    </dd>

                    {{--  タグ  --}}
                    <dt><span class="required">タグ</span></dt>
                    <dd class="border_line">
                        <select id="post_tag" class="validate[required]" name="post_tag">
                            <option value="" selected="selected">タグを選択</option>
                            <option value="椅子" data-pref-id="1">椅子</option>
                            <option value="机" data-pref-id="2">机</option>
                            <option value="棚" data-pref-id="3">棚</option>
                            <option value="その他" data-pref-id="4">その他</option>
                            <label for="post_tag"></label>
                        </select> 
                    </dd>
                    

                    {{--  <dt><span class="required">作り方</span></dt>
                    <dd class="border_line">
                        <textarea class="post_exp @error('post_exp') is-invalid @enderror" name="post_exp" required autocomplete="post_exp" rows="5">{{ old('post_exp') }}</textarea>

                        @error('post_exp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </dd>  --}}
                    
                </dl>
                <div class="btn">
                    <button type="submit" name="cancel" class="btn submit-button">
                        キャンセルする
                    </button>
                    <button type="submit" class="btn submit-button">
                        投稿する
                    </button>
                </div>
                {{--  <div class="form-group row mb-0">
                    <div class="col-md-12 post_exp-right">
                        <p class="mb-4 post_exp-danger">140文字以内</p>
                        <button type="submit" class="btn btn-primary">
                            ツイートする
                        </button>
                    </div>
                </div>  --}}
            </form>
        </div>
    </main>
</body>
</html>
@endsection
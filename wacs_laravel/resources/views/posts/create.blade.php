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
            {{--  タイトル  --}}
            <div class="title_area">
                <h2 class="title">DIY投稿</h2>
            </div>

            <form id="post_creat_form" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <dl class="form-area">
                    
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
                        <span id="addbutton">材料・数量</span>
                        <span id="reload"><button id="add_material" type="button">+ 追加</button></span>
                        <br>
                            <span id="message_material"></span>
                        </br>
                    </dt>

                    <dd id="material" class="border_line">
                        <div class="material_text material_text1">
                            <input id="material_name1" class="input-text validate[required,maxSize[16]]" type="text" name="material_name1" placeholder="材料"  value="{{ old('material') }}">
                            <span><select id="material_num1" class="validate[required] material_num" name="material_num1">
                                <option value="" selected="selected">数量を選択</option>
                                <option value="1" data-pref-id="1">1</option>
                                <option value="2" data-pref-id="2">2</option>
                                <option value="3" data-pref-id="3">3</option>
                                <option value="4" data-pref-id="4">4</option>
                                <option value="5" data-pref-id="5">5</option>
                                <option value="6" data-pref-id="6">6</option>
                                <option value="7" data-pref-id="7">7</option>
                                <option value="8" data-pref-id="8">8</option>
                                <option value="9" data-pref-id="9">9</option>
                                <option value="10" data-pref-id="10">10</option>
                                <label for="material_num1"></label>
                            </select></span>
                        </div>
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
                        <div class="tool_text1"><input id="tool_name1" class="input-text validate[required,maxSize[16]]" type="text" name="tool_name1" placeholder="道具"  value="{{ old('tool') }}"></div>
                    </dd>

                    {{--  作り方  --}}
                    <dt><span class="required">作り方</span></dt>
                    <dd class="border_line">
                        <textarea id="method" class="method" name="method" value="{{ old('method') }}"></textarea>
                    </dd>

                    {{--  タグ  --}}
                    <dt><span class="required">タグ</span></dt>
                    <dd class="border_line">
                        <select id="post_tag1" class="validate[required]" name="post_tag1">
                            <option value="" selected="selected">タグを選択</option>
                            <option value="椅子" data-pref-id="1">椅子</option>
                            <option value="机" data-pref-id="2">机</option>
                            <option value="棚" data-pref-id="3">棚</option>
                            <option value="その他" data-pref-id="4">その他</option>
                            <label for="post_tag1"></label>
                        </select> 
                        <select id="post_tag2" class="validate[required]" name="post_tag2">
                            <option value="" selected="selected">タグを選択</option>
                            <option value="椅子" data-pref-id="1">椅子</option>
                            <option value="机" data-pref-id="2">机</option>
                            <option value="棚" data-pref-id="3">棚</option>
                            <option value="その他" data-pref-id="4">その他</option>
                            <label for="post_tag2"></label>
                        </select> 
                        <select id="post_tag3" class="validate[required]" name="post_tag3">
                            <option value="" selected="selected">タグを選択</option>
                            <option value="椅子" data-pref-id="1">椅子</option>
                            <option value="机" data-pref-id="2">机</option>
                            <option value="棚" data-pref-id="3">棚</option>
                            <option value="その他" data-pref-id="4">その他</option>
                            <label for="post_tag3"></label>
                        </select> 
                    </dd>
                    

                
                    
                </dl>
                <div class="btn">
                    <button type="submit" name="cancel" class="btn submit-button">
                        キャンセルする
                    </button>
                    <button type="submit" class="btn submit-button">
                        投稿する
                    </button>
                </div>
                
            </form>
        </div>
    </main>
</body>
</html>
@endsection
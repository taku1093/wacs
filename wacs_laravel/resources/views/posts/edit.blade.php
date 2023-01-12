@extends('layouts.app')

@section('content')
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

</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="post_create">
                    {{--  タイトル  --}}
                    <div class="title_area">
                            <h2 class="title">DIY投稿編集</h2>
                        </div>
                    <form method="POST" action="{{ route('posts.update', ['posts' => $posts]) }}">
                        @csrf
                        @method('PUT')

                        {{--  <div class="form-group row mb-0">
                            <div class="col-md-12 p-3 w-100 d-flex">
                                <img src="{{ asset('storage/profile_image/' .$user->profile_image) }}" class="rounded-circle" width="50" height="50">
                                @if ($user->user_icon == null)
                                <img src="{{asset('img/default_icon.png') }}" alt="デフォルトアイコン" class="circle-image">
                                @else
                                <img src="{{ asset('storage/user_icon/' .$user->user_icon) }}"  class="circle-image">
                                @endif

                                <div class="ml-2 d-flex flex-column">
                                    <p class="mb-0">{{ $user->user_screen_name }}</p>
                                    <a href="{{ url('users/' .$user->id) }}" class="text-secondary">{{ $user->screen_name }}</a>
                                </div>
                            </div>
                        
                        </div>  --}}

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
                            <dd class="border_line"><input id="post_title" class="input-text validate[required,maxSize[16]]" type="text" name="post_title" placeholder="投稿のタイトル"  value="{{ old('post_title') ? : $posts->post_title }}"></dd>
        
                            {{--  タイトル  --}}
                            <dt><span class="required">投稿説明</span></dt>
                            <dd class="border_line"><input id="post_exp" class="input-text validate[required,maxSize[16]]" type="text" name="post_exp" placeholder="投稿の説明"  value="{{ old('post_exp') ? : $posts->post_exp }}"></dd>
        
                            {{--  材料  --}}
                            
                            @foreach ($posts->materials as $posts->materials)
                                @if (isset($posts->materials->material_name1))
                                    
                                    <dt>
                                        <span id="addbutton">材料・数量</span>
                                    </dt>

                                    <dd id="material" class="border_line">
                                        
                                        {{--  材料1  --}}
                                        <div class="material_text material_text1">
                                            
                                            @if (isset($posts->materials->material_name1))
                                                <input id="material_name1" class="input-text validate[required,maxSize[16]]" type="text" name="material_name1" placeholder="材料"  value="{{ old('material_name1') ? : $posts->materials->material_name1 }}">
                                                <span><select id="material_num1" class="validate[required] material_num" name="material_num1" value="{{ old('material_num1') ? : $posts->materials_material_num1 }}">
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
                                            @else
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
                                            @endif
                                        </div>

                                        {{--  材料2  --}}
                                        <div class="material_text material_text1">
                                            @if (isset($posts->materials->material_name4))
                                                <input id="material_name2" class="input-text validate[required,maxSize[16]]" type="text" name="material_name2" placeholder="材料"  value="{{ old('material_name2') ? : $posts->materials->material_name2 }}">
                                                <span><select id="material_num2" class="validate[required] material_num" name="material_num2" value="{{ old('material_num2') ? : $posts->materials_material_num1 }}">
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
                                                    <label for="material_num2"></label>
                                                </select></span>
                                            @else
                                                <input id="material_name2" class="input-text validate[required,maxSize[16]]" type="text" name="material_name2" placeholder="材料"  value="{{ old('material') }}">
                                                <span><select id="material_num2" class="validate[required] material_num" name="material_num2">
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
                                                    <label for="material_num2"></label>
                                                </select></span>
                                            @endif
                                        </div>

                                        {{--  材料3  --}}
                                        <div class="material_text material_text1">
                                            @if (isset($posts->materials->material_name3))
                                                <input id="material_name3" class="input-text validate[required,maxSize[16]]" type="text" name="material_name3" placeholder="材料"  value="{{ old('material_name3') ? : $posts->materials->material_name3 }}">
                                                <span><select id="material_num3" class="validate[required] material_num" name="material_num3" value="{{ old('material_num3') ? : $posts->materials_material_num1 }}">
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
                                                    <label for="material_num3"></label>
                                                </select></span>
                                            @else
                                                <input id="material_name3" class="input-text validate[required,maxSize[16]]" type="text" name="material_name3" placeholder="材料"  value="{{ old('material') }}">
                                                <span><select id="material_num3" class="validate[required] material_num" name="material_num3">
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
                                                    <label for="material_num3"></label>
                                                </select></span>
                                            @endif
                                        </div>

                                        {{--  材料4  --}}
                                        <div class="material_text material_text1">
                                            @if (isset($posts->materials->material_name4))
                                                <input id="material_name4" class="input-text validate[required,maxSize[16]]" type="text" name="material_name4" placeholder="材料"  value="{{ old('material_name4') ? : $posts->materials->material_name4 }}">
                                                <span><select id="material_num4" class="validate[required] material_num" name="material_num4" value="{{ old('material_num4') ? : $posts->materials_material_num1 }}">
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
                                                    <label for="material_num4"></label>
                                                </select></span>
                                            @else
                                                <input id="material_name4" class="input-text validate[required,maxSize[16]]" type="text" name="material_name4" placeholder="材料"  value="{{ old('material') }}">
                                                <span><select id="material_num4" class="validate[required] material_num" name="material_num4">
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
                                                    <label for="material_num4"></label>
                                                </select></span>
                                            @endif
                                        </div>

                                        {{--  材料5  --}}
                                        <div class="material_text material_text1">
                                            @if (isset($posts->materials->material_name5))
                                                <input id="material_name5" class="input-text validate[required,maxSize[16]]" type="text" name="material_name5" placeholder="材料"  value="{{ old('material_name5') ? : $posts->materials->material_name5 }}">
                                                <span><select id="material_num5" class="validate[required] material_num" name="material_num5" value="{{ old('material_num5') ? : $posts->materials_material_num1 }}">
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
                                                    <label for="material_num5"></label>
                                                </select></span>
                                            @else
                                                <input id="material_name5" class="input-text validate[required,maxSize[16]]" type="text" name="material_name5" placeholder="材料"  value="{{ old('material') }}">
                                                <span><select id="material_num5" class="validate[required] material_num" name="material_num5">
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
                                                    <label for="material_num5"></label>
                                                </select></span>
                                            @endif
                                        </div>

                                        {{--  材料6  --}}
                                        <div class="material_text material_text1">
                                            @if (isset($posts->materials->material_name6))
                                                <input id="material_name6" class="input-text validate[required,maxSize[16]]" type="text" name="material_name6" placeholder="材料"  value="{{ old('material_name6') ? : $posts->materials->material_name6 }}">
                                                <span><select id="material_num6" class="validate[required] material_num" name="material_num6" value="{{ old('material_num6') ? : $posts->materials_material_num1 }}">
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
                                                    <label for="material_num6"></label>
                                                </select></span>
                                            @else
                                                <input id="material_name6" class="input-text validate[required,maxSize[16]]" type="text" name="material_name6" placeholder="材料"  value="{{ old('material') }}">
                                                <span><select id="material_num6" class="validate[required] material_num" name="material_num6">
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
                                                    <label for="material_num6"></label>
                                                </select></span>
                                            @endif
                                        </div>

                                        {{--  材料7  --}}
                                        <div class="material_text material_text1">
                                            @if (isset($posts->materials->material_name7))
                                                <input id="material_name7" class="input-text validate[required,maxSize[16]]" type="text" name="material_name7" placeholder="材料"  value="{{ old('material_name7') ? : $posts->materials->material_name7 }}">
                                                <span><select id="material_num7" class="validate[required] material_num" name="material_num7" value="{{ old('material_num7') ? : $posts->materials_material_num1 }}">
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
                                                    <label for="material_num7"></label>
                                                </select></span>
                                            @else
                                                <input id="material_name7" class="input-text validate[required,maxSize[16]]" type="text" name="material_name7" placeholder="材料"  value="{{ old('material') }}">
                                                <span><select id="material_num7" class="validate[required] material_num" name="material_num7">
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
                                                    <label for="material_num7"></label>
                                                </select></span>
                                            @endif
                                        </div>

                                        {{--  材料8  --}}
                                        <div class="material_text material_text1">
                                            @if (isset($posts->materials->material_name8))
                                                <input id="material_name8" class="input-text validate[required,maxSize[16]]" type="text" name="material_name8" placeholder="材料"  value="{{ old('material_name8') ? : $posts->materials->material_name8 }}">
                                                <span><select id="material_num8" class="validate[required] material_num" name="material_num8" value="{{ old('material_num8') ? : $posts->materials_material_num1 }}">
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
                                                    <label for="material_num8"></label>
                                                </select></span>
                                            @else
                                                <input id="material_name8" class="input-text validate[required,maxSize[16]]" type="text" name="material_name8" placeholder="材料"  value="{{ old('material') }}">
                                                <span><select id="material_num8" class="validate[required] material_num" name="material_num8">
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
                                                    <label for="material_num8"></label>
                                                </select></span>
                                            @endif
                                        </div>

                                        {{--  材料9  --}}
                                        <div class="material_text material_text1">
                                            @if (isset($posts->materials->material_name9))
                                                <input id="material_name9" class="input-text validate[required,maxSize[16]]" type="text" name="material_name9" placeholder="材料"  value="{{ old('material_name9') ? : $posts->materials->material_name9 }}">
                                                <span><select id="material_num9" class="validate[required] material_num" name="material_num9" value="{{ old('material_num9') ? : $posts->materials_material_num1 }}">
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
                                                    <label for="material_num9"></label>
                                                </select></span>
                                            @else
                                                <input id="material_name9" class="input-text validate[required,maxSize[16]]" type="text" name="material_name9" placeholder="材料"  value="{{ old('material') }}">
                                                <span><select id="material_num9" class="validate[required] material_num" name="material_num9">
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
                                                    <label for="material_num9"></label>
                                                </select></span>
                                            @endif
                                        </div>

                                        {{--  材料10  --}}
                                        <div class="material_text material_text1">
                                            @if (isset($posts->materials->material_name10))
                                                <input id="material_name10" class="input-text validate[required,maxSize[16]]" type="text" name="material_name10" placeholder="材料"  value="{{ old('material_name10') ? : $posts->materials->material_name10 }}">
                                                <span><select id="material_num10" class="validate[required] material_num" name="material_num10" value="{{ old('material_num10') ? : $posts->materials_material_num1 }}">
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
                                                    <label for="material_num10"></label>
                                                </select></span>
                                            @else
                                                <input id="material_name10" class="input-text validate[required,maxSize[16]]" type="text" name="material_name10" placeholder="材料"  value="{{ old('material') }}">
                                                <span><select id="material_num10" class="validate[required] material_num" name="material_num10">
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
                                                    <label for="material_num10"></label>
                                                </select></span>
                                            @endif
                                        </div>
                                    </dd>

                                @elseif ($posts->materials->material_name1 === null)
                                {{--  最初から未入力の場合  --}}
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
                                @endif
                            @endforeach
                            
                            {{--  道具  --}}
                            <dt>
                                <span id="addbutton">道具</span>
                                <span id="reload"><button id="add_tool" type="button">+ 追加</button></span>
                                <br>
                                    <span id="message_tool"></span>
                                </br>
                            </dt>
        
                            <dd id="tool" class="border_line">
                                <div class="tool_text1"><input id="tool_name1" class="input-text validate[required,maxSize[16]]" type="text" name="tool_name1" placeholder="道具"  value="{{ old('tool_name1') ? : $posts->tool_name1 }}"></div>
                            </dd>
        
                            {{--  作り方  --}}
                            <dt><span class="required">作り方</span></dt>
                            <dd class="border_line">
                                <textarea id="method" class="method" name="method" value="{{ old('method') }}">{{ old('method') ? : $posts->method }}</textarea>
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
                                編集する
                            </button>
                        </div>

                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
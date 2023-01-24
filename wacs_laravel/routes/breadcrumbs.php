<?php

// これを追加してね
// {{ Breadcrumbs::render('') }}
//<link rel="stylesheet" type="text/css" href="{{ asset('css\bred.css')}}">

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('TOP', url('/'));
});

// Home > ログイン
Breadcrumbs::for('login', function ($trail) {
    $trail->parent('home');
    $trail->push('ログイン', route('DIY_home'));
});

// Home > DIYhome
Breadcrumbs::for('DIY_home', function ($trail) {
    $trail->parent('home');
    $trail->push('DIYホーム', route('DIY_home'));
});

// Home > DIYhome > 投稿一覧
Breadcrumbs::for('post_all', function ($trail) {
    $trail->parent('DIY_home');
    $trail->push('投稿一覧', route('posts.index'));
});

// Home > DIYhome > 投稿一覧 > show
Breadcrumbs::for('show', function ($trail) {
    $trail->parent('post_all');
    $trail->push('投稿詳細', 'http://localhost/project/wacs/wacs_laravel/public/posts');
});

// Home > DIYhome > 投稿一覧 > edit
Breadcrumbs::for('edit', function ($trail) {
    $trail->parent('post_all');
    $trail->push('投稿編集', 'http://localhost/project/wacs/wacs_laravel/public/posts');
});

// Home > DIYhome > 投稿一覧 > 新規投稿
Breadcrumbs::for('post_create', function ($trail) {
    $trail->parent('post_all');
    $trail->push('新規投稿', route('DIY_home'));
});

// Home > 問い合わせ
Breadcrumbs::for('contact', function ($trail) {
    $trail->parent('home');
    $trail->push('お問い合わせ', route('DIY_home'));
});

// Home > DIYホーム > ランキング
Breadcrumbs::for('ranking', function ($trail) {
    $trail->parent('DIY_home');
    $trail->push('ランキング', route('ranking_all'));
});

// Home > シミュレーション
Breadcrumbs::for('simulation', function ($trail) {
    $trail->parent('DIY_home');
    $trail->push('シミュレーション', route('simulation'));
});

// Home > シミュレーション > モデル
Breadcrumbs::for('simulation_model', function ($trail) {
    $trail->parent('simulation');
    $trail->push('モデル', route('DIY_home'));
});

// Home > Q&A
Breadcrumbs::for('QA', function ($trail) {
    $trail->parent('DIY_home');
    $trail->push('Q&A', route('qanda.index'));
});

// Home > Q&A > QA詳細
Breadcrumbs::for('QA_show', function ($trail) {
    $trail->parent('QA');
    $trail->push('Q&A詳細', route('DIY_home'));
});

// Home > Q&A > QA編集
Breadcrumbs::for('QA_edit', function ($trail) {
    $trail->parent('QA');
    $trail->push('Q&A編集', route('DIY_home'));
});

// Home > Q&A > QA新規作成
Breadcrumbs::for('QA_create', function ($trail) {
    $trail->parent('QA');
    $trail->push('Q&A新規作成', route('DIY_home'));
});

// Home > マイページ
Breadcrumbs::for('mypezi', function ($trail) {
    $trail->parent('home');
    $trail->push('マイページ', 'http://localhost/project/wacs/wacs_laravel/public/users/1');
});

// Home > マイページ > マイページ編集
Breadcrumbs::for('mypezi_edit', function ($trail) {
    $trail->parent('mypezi');
    $trail->push('アカウント・マイページ情報編集', route('DIY_home'));
});
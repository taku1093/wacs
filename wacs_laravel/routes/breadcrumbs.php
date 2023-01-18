<?php

// これを追加してね
// {{ Breadcrumbs::render('') }}

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('TOP', url('/'));
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

// Home > Q&A
Breadcrumbs::for('QA', function ($trail) {
    $trail->parent('DIY_home');
    $trail->push('Q&A', route('DIY_home'));
});
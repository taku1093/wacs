<?php
// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('ホーム', 'http://localhost/project/wacs/wacs_laravel/public/');
});

// Home > DIYhome
Breadcrumbs::for('DIY_home', function ($trail) {
    $trail->parent('home');
    $trail->push('DIYホーム', 'http://localhost/project/wacs/wacs_laravel/public/DIY_home');
});

// Home > DIYhome > show
Breadcrumbs::for('show', function ($trail) {
    $trail->parent('DIY_home');
    $trail->push('投稿詳細', 'http://localhost/project/wacs/wacs_laravel/public/posts');
});
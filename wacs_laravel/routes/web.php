<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\contactController;

Route::get('/', 'WelcomeController@index')->name('welcome');;
Route::get('maintenance', 'WelcomeController@maintenance')->name('maintenance');;


// ログイン認証
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// 新規登録確認
Route::post('register', 'Auth\RegisterController@post')->name('user.register_post');
Route::get('register/confirm', 'Auth\RegisterController@confirm')->name('user.register_confirm');
Route::post('register/confirm', 'Auth\RegisterController@register')->name('user.resister_resister');
Route::get('terms', 'Auth\RegisterController@terms')->name('terms');;

// お問い合わせ
Route::get('contact', 'ContactController@index')->name('contact');


// DIY
Route::get('/DIY_home', 'HomeController@index_DIY')->name('DIY_home');

// 投稿関連
// Route::resource('posts/index', 'PostsController@index');

// ログイン状態
Route::group(['middleware' => 'auth'], function() {
     // ユーザ関連
    Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'edit', 'update']]);

    // フォロー/フォロー解除を追加
    Route::post('users/{user}/follow', 'UsersController@follow')->name('follow');
    Route::delete('users/{user}/unfollow', 'UsersController@unfollow')->name('unfollow');

    // 投稿関連
    Route::resource('posts', 'PostsController', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']]);
    // Route::get('posts/edit/', 'PostsController@edit')->name('post_edit');

    // コメント関連
    Route::resource('comments', 'CommentsController', ['only' => ['store', 'show']]);

    // 返信関連
    Route::resource('replies', 'RepliesController', ['only' => ['store']]);

    // コメントいいね
    Route::resource('comment_goods', 'Comment_goodsController', ['only' => ['store', 'destroy']]);

    // 返信いいね
    Route::resource('reply_goods', 'Reply_goodsController', ['only' => ['store', 'destroy']]);

    // いいね関連
    Route::resource('post_goods', 'Post_goodsController', ['only' => ['store', 'destroy']]);

    
});

//Q&A
Route::get('qanda', 'QapostsController@index');

//詳細画面(Q&A)
Route::resource('qanda', 'QapostsController', ['only' => ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']]);

//コメント(Q&A)
Route::resource('qacomment', 'QacommentsController', ['only' => ['store']]);

//シミュレーション関連
    Route::get('simulation', 'SimulationController@index')->name('simulation');
    Route::get('simulation/model1', 'SimulationController@model1')->name('simu_model1');
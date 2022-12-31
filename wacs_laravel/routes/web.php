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


// ログイン認証
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// 新規登録確認
Route::post('register', 'Auth\RegisterController@post')->name('user.register_post');
Route::get('register/confirm', 'Auth\RegisterController@confirm')->name('user.register_confirm');
Route::post('register/confirm', 'Auth\RegisterController@register')->name('user.resister_resister');

// お問い合わせ
Route::get('contact', 'ContactController@index')->name('contact');


// DIY
Route::get('/DIY_home', 'HomeController@index_DIY')->name('DIY_home');

// ログイン状態
Route::group(['middleware' => 'auth'], function() {
     // ユーザ関連
    Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'edit', 'update']]);

    // フォロー/フォロー解除を追加
    Route::post('users/{user}/follow', 'UsersController@follow')->name('follow');
    Route::delete('users/{user}/unfollow', 'UsersController@unfollow')->name('unfollow');

    // ツイート関連
    Route::resource('posts', 'PostsController', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']]);

    //シミュレーション関連
    Route::get('simulation', 'SimulationController@index')->name('simulation');
});
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
    Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'edit', 'update', 'destroy']]);
    Route::post('users/conf', 'UsersController@confirm')->name('user.conf');

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
    Route::get('simulation/model2', 'SimulationController@model2')->name('simu_model2');
    Route::get('simulation/model3', 'SimulationController@model3')->name('simu_model3');
    Route::get('simulation/model4', 'SimulationController@model4')->name('simu_model4');
    Route::get('simulation/model5', 'SimulationController@model5')->name('simu_model5');
    Route::get('simulation/model6', 'SimulationController@model6')->name('simu_model6');
    Route::get('simulation/model7', 'SimulationController@model7')->name('simu_model7');
    Route::get('simulation/model8', 'SimulationController@model8')->name('simu_model8');
    Route::get('simulation/model9', 'SimulationController@model9')->name('simu_model9');
    Route::get('simulation/model10', 'SimulationController@model10')->name('simu_model10');
    Route::get('simulation/model11', 'SimulationController@model11')->name('simu_model11');
    Route::get('simulation/model12', 'SimulationController@model12')->name('simu_model12');
    Route::get('simulation/model13', 'SimulationController@model13')->name('simu_model13');
    Route::get('simulation/model14', 'SimulationController@model14')->name('simu_model14');
    Route::get('simulation/model15', 'SimulationController@model15')->name('simu_model15');
    Route::get('simulation/model16', 'SimulationController@model16')->name('simu_model16');
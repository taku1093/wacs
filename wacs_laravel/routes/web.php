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

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('password_forget', 'Auth\LoginController@password_forget')->name('password_forget');;


// 新規登録確認
Route::post('register', 'Auth\RegisterController@post')->name('user.register_post');
Route::get('register/confirm', 'Auth\RegisterController@confirm')->name('user.register_confirm');
Route::post('register/confirm', 'Auth\RegisterController@register')->name('user.resister_resister');
Route::get('terms', 'Auth\RegisterController@terms')->name('terms');;

// お問い合わせ
// Route::get('contact', 'ContactController@index')->name('contact');
    Route::get('contact', 'ContactController@index')->name('contact');
    Route::get('contact_store', 'ContactController@store')->name('contact_store');
    Route::post('contact_store', 'ContactController@store')->name('contact_store');


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

    // ランキング
    Route::get('ranking_all', 'RankingController@all')->name('ranking_all');
    Route::get('ranking_week', 'RankingController@week')->name('ranking_week');
    Route::get('ranking_month', 'RankingController@month')->name('ranking_month');

    // クーポン
    Route::get('coupon', 'CouponController@index')->name('coupon');
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




    Route::group(['middleware' => 'auth'], function() {
        Route::get('/admin_home', 'AdminController@home')->name('admin_home');
        Route::post('/admin_home', 'AdminController@home')->name('admin_home');
        Route::get('/post_manage', 'AdminController@post_manage')->name('post_manage');
        Route::get('post_delete_ready{id}', 'AdminController@post_delete_ready');
        Route::post('post_delete_ready{id}', 'AdminController@post_delete_ready');
        Route::get('post_delete_comp{id}', 'AdminController@post_delete_comp');
        Route::post('post_delete_comp{id}', 'AdminController@post_delete_comp');
        Route::get('/user_manage', 'AdminController@user_manage')->name('user_manage');
        Route::post('/user_manage', 'AdminController@user_manage')->name('user_manage');
        Route::get('user_manage{id}', 'AdminController@user_edit');
        Route::post('user_manage{id}', 'AdminController@user_edit');
        Route::get('user_delete_ready{id}', 'AdminController@user_delete_ready');
        Route::post('user_delete_ready{id}', 'AdminController@user_delete_ready');
        Route::get('user_delete_comp{id}', 'AdminController@user_delete_comp');
        Route::post('user_delete_comp{id}', 'AdminController@user_delete_comp');
        Route::get('/ad_manage', 'AdminController@ad_manage')->name('ad_manage');
        Route::get('/ad_create', 'AdminController@ad_create')->name('ad_create');
        Route::get('/ad_store', 'AdminController@ad_store')->name('ad_store');
        Route::post('/ad_store', 'AdminController@ad_store')->name('ad_store');
        Route::get('ad_manage{id}', 'AdminController@ad_edit');
        Route::post('ad_manage{id}', 'AdminController@ad_edit');
        Route::get('ad_delete_ready{id}', 'AdminController@ad_delete_ready');
        Route::post('ad_delete_ready{id}', 'AdminController@ad_delete_ready');
        Route::get('ad_delete_comp{id}', 'AdminController@ad_delete_comp');
        Route::post('ad_delete_comp{id}', 'AdminController@ad_delete_comp');
        Route::get('/coupon_manage', 'AdminController@coupon_manage')->name('coupon_manage');
        Route::get('/coupon_create', 'AdminController@coupon_create')->name('coupon_create');
        Route::get('/coupon_store', 'AdminController@coupon_store')->name('coupon_store');
        Route::post('/coupon_store', 'AdminController@coupon_store')->name('coupon_store');
        Route::get('coupon_manage{id}', 'AdminController@coupon_edit');
        Route::post('coupon_manage{id}', 'AdminController@coupon_edit');
        Route::get('coupon_delete_ready{id}', 'AdminController@coupon_delete_ready');
        Route::post('coupon_delete_ready{id}', 'AdminController@coupon_delete_ready');
        Route::get('coupon_delete_comp{id}', 'AdminController@coupon_delete_comp');
        Route::post('coupon_delete_comp{id}', 'AdminController@coupon_delete_comp');
        Route::get('/ranking_manage', 'AdminController@ranking_manage')->name('ranking_manage');
        Route::get('/ranking_update_ready', 'AdminController@ranking_update_ready')->name('ranking_update_ready');
        Route::get('/ranking_update_comp', 'AdminController@ranking_update_comp')->name('ranking_update_comp');
        Route::post('/ranking_update_comp', 'AdminController@ranking_update_comp')->name('ranking_update_comp');
        Route::get('/contact_manage', 'AdminController@contact_manage')->name('contact_manage');
        Route::get('contact_manage{id}', 'AdminController@contact_edit');
        Route::post('contact_manage{id}', 'AdminController@contact_edit');
        Route::get('contact_delete_ready{id}', 'AdminController@contact_delete_ready');
        Route::post('contact_delete_ready{id}', 'AdminController@contact_delete_ready');
        Route::get('contact_delete_comp{id}', 'AdminController@contact_delete_comp');
        Route::post('contact_delete_comp{id}', 'AdminController@contact_delete_comp');
        Route::get('/logout', 'AdminController@logout')->name('logout');
        Route::post('/logout', 'AdminController@logout')->name('logout');
    }
);

    

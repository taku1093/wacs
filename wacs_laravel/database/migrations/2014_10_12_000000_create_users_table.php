<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // first_create
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // $table->increments('id');
            // $table->string('screen_name')->unique()->null()->comment('アカウント名');
            // $table->string('name')->null()->comment('ユーザ名');
            // $table->string('profile_image')->nullable()->comment('プロフィール画像');
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->rememberToken();
            // $table->timestamps();

            // $table->increments('user_id')->nullable()->comment('ユーザID');
            $table->increments('id');
            // $table->string('user_sur')->nullable()->comment('姓');
            // $table->string('user_name')->nullable()->comment('名');
            // $table->string('user_sur_kana')->nullable()->comment('姓（カナ）');
            // $table->string('user_name_kana')->nullable()->comment('名（メイ）');
            $table->string('user_name')->nullable()->comment('氏名');
            $table->string('user_name_kana')->nullable()->comment('氏名(カナ)');
            $table->string('screen_name')->nullable()->unique()->comment('アカウント名');
            $table->string('user_screen_name')->nullable()->comment('ユーザネーム');
            $table->string('email')->nullable()->comment('メールアドレス');
            $table->char('password')->nullable()->comment('パスワード');
            $table->string('year')->nullable()->comment('生年月日(年)');
            $table->string('month')->nullable()->comment('生年月日(月)');
            $table->string('date')->nullable()->comment('生年月日(日)');
            $table->string('user_gen')->nullable()->comment('性別');
            $table->string('user_pre')->nullable()->comment('住所（県）');
            $table->string('user_city')->nullable()->comment('住所（市）');
            $table->string('user_tell')->nullable()->comment('電話番号');
            $table->char('user_icon')->nullable()->comment('アイコン');
            $table->string('user_intro')->nullable()->comment('自己紹介文');
            $table->integer('user_follow')->nullable()->comment('フォロー数');
            $table->integer('user_follower')->nullable()->comment('フォロワー数');
            $table->integer('user_good')->nullable()->comment('いいね数');
            $table->integer('user_eval')->nullable()->comment('評価数');
            $table->integer('user_admin')->nullable()->comment('権限');
            $table->integer('user_count')->nullable()->comment('通報回数');
            $table->integer('user_froz')->nullable()->comment('凍結');
            $table->timestamps();

            $table->timestamp('email_verified_at')->nullable()->comment('メアド確認');
            $table->rememberToken()->comment('ログイン状態保持');
        
            // $table->increments('id');
            // // $table->string('screen_name')->unique()->null()->comment('アカウント名');
            // $table->string('name')->null()->comment('ユーザ名');
            // $table->string('profile_image')->nullable()->comment('プロフィール画像');
            // // $table->string('email')->unique();
            // // $table->timestamp('email_verified_at')->nullable();
            // // $table->string('password');
            // // $table->rememberToken();
            // // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

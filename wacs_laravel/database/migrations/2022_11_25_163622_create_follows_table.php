<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->increments('follow_id')->nullable()->comment('フォローID');//外部設計書：good_id
            $table->unsignedInteger('user_id')->nullable()->comment('フォローしているユーザID');
            $table->unsignedInteger('pair_user_id')->nullable()->comment('フォローされているユーザID');

            // 予備
            $table->unsignedInteger('following_id')->comment('フォローしているユーザID2');
            $table->unsignedInteger('followed_id')->comment('フォローされているユーザID2');
            // 索引設定
            $table->index('follow_id');
            $table->index('user_id');
            $table->index('pair_user_id');

            $table->index('following_id');
            $table->index('followed_id');

            $table->unique([
                'following_id',
                'followed_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
}

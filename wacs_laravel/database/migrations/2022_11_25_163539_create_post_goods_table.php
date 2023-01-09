<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_goods', function (Blueprint $table) {
            $table->increments('id')->nullable()->comment('いいねID');
            $table->unsignedInteger('user_id')->nullable()->comment('ユーザID');
            $table->unsignedInteger('post_id')->nullable()->comment('投稿ID');

            // 索引設定
            // $table->index('good_id');
            $table->index('user_id');
            $table->index('post_id');

            // UK設定
            $table->unique([
                'user_id',
                'post_id'
            ]);

            // FK設定
            $table->foreign('user_id')
                //->references('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('post_id')
                // ->references('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_goods');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //  first_create
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            // $table->increments('post_id')->nullable()->comment('投稿ID');
            $table->increments('id')->nullable()->comment('投稿ID');
            // unsignedInteger：符号なし整数
            $table->unsignedInteger('user_id')->nullable()->comment('ユーザID');
            $table->string('post_title')->nullable()->comment('タイトル');
            $table->char('post_img1')->nullable()->comment('画像1');
            $table->char('post_img2')->nullable()->comment('画像2');
            $table->char('post_img3')->nullable()->comment('画像3');
            $table->string('post_exp')->nullable()->comment('説明');
            // softDeletes:復元可能削除機能
            $table->string('method')->nullable()->comment('作成方法');
            $table->string('material')->nullable()->comment('材料');
            $table->string('tool')->nullable()->comment('道具');
            $table->string('post_genre')->nullable()->comment('ジャンル');
            $table->string('post_tag')->nullable()->comment('タグ');

            $table->softDeletes();
            $table->timestamps();

            // 索引用設定
            // $table->index('post_id');
            $table->index('id');
            $table->index('user_id');
            $table->index('post_exp');

            // FK設定
            $table->foreign('user_id')//postテーブルのuser_id
                //->references('user_id')//userテーブルのuser_id
                ->references('id')//userテーブルのuser_id
                ->on('users')
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
        Schema::dropIfExists('posts');
    }
}

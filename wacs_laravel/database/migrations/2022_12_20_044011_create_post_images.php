<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_images', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->increments('post_image_id')->nullable()->comment('投稿動画像ID');
            $table->unsignedInteger('post_id')->nullable()->comment('投稿ID');
            $table->char('post_img')->nullable()->comment('画像');
            $table->char('post_movie')->nullable()->comment('動画');

            $table->softDeletes();
            $table->timestamps();

            // 索引用設定
            $table->index('post_image_id');
            $table->index('post_id');
            $table->index('post_img');
            $table->index('post_movie');

            // FK設定
            $table->foreign('post_id')//post_imgテーブルのpost_id
                ->references('post_id')//postテーブルのpost_id
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
        Schema::dropIfExists('post_images');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id')->nullable()->comment('コメントID');
            $table->unsignedInteger('user_id')->nullable()->comment('ユーザID');
            $table->unsignedInteger('post_id')->nullable()->comment('投稿ID');
            $table->Integer('comment_parent')->nullable()->comment('親コメントID');
            $table->string('comment_text')->nullable()->comment('コメント内容');
            $table->integer('comment_count')->default(0)->nullable()->comment('通報回数');

            // $table->softDeletes();
            $table->timestamps();

            // 索引設定
            // $table->index('comment_id');
            $table->index('user_id');
            $table->index('post_id');

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
        Schema::dropIfExists('comments');
    }
}

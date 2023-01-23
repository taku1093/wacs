<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->increments('id')->nullable()->comment('コメント返信ID');
            $table->unsignedInteger('user_id')->nullable()->comment('ユーザID');
            $table->unsignedInteger('comment_id')->nullable()->comment('コメントID');
            // $table->Integer('comment_parent')->nullable()->comment('親コメントID');
            $table->string('reply_text')->nullable()->comment('返信内容');
            $table->integer('reply_count')->default(0)->nullable()->comment('通報回数');

            // $table->softDeletes();
            $table->timestamps();

            // 索引設定
            // $table->index('comment_id');
            $table->index('user_id');
            $table->index('comment_id');

            // FK設定
            $table->foreign('user_id')
                //->references('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('comment_id')
                // ->references('comment_id')
                ->references('id')
                ->on('comments')
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
        Schema::dropIfExists('replies');
    }
}

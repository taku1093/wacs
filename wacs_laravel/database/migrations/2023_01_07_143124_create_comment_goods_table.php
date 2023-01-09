<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_goods', function (Blueprint $table) {
            $table->increments('id')->nullable()->comment('コメントいいねID');
            $table->unsignedInteger('user_id')->nullable()->comment('コメントユーザID');
            $table->unsignedInteger('comment_id')->nullable()->comment('コメントID');

            // 索引設定
            // $table->index('good_id');
            $table->index('user_id');
            $table->index('comment_id');

            // UK設定
            $table->unique([
                'user_id',
                'comment_id'
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
        Schema::dropIfExists('comment_goods');
    }
}

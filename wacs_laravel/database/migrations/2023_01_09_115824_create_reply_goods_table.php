<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_goods', function (Blueprint $table) {
            $table->increments('id')->nullable()->comment('返信いいねID');
            $table->unsignedInteger('user_id')->nullable()->comment('返信ユーザID');
            $table->unsignedInteger('reply_id')->nullable()->comment('返信ID');

            // 索引設定
            // $table->index('good_id');
            $table->index('user_id');
            $table->index('reply_id');

            // UK設定
            $table->unique([
                'user_id',
                'reply_id'
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
        Schema::dropIfExists('reply_goods');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->increments('id')->nullable()->comment('評価ID');
            $table->unsignedInteger('user_id')->nullable()->comment('(評価された側)ユーザID');
            $table->unsignedInteger('eval_user_id')->nullable()->comment('(評価した側)ユーザID');
            $table->integer('eval_number')->nullable()->comment('評価値');

            $table->timestamps();

            // FK設定
            $table->foreign('user_id')//materialテーブルのpost_id
                ->references('id')//postテーブルのpost_id
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
        Schema::dropIfExists('evaluations');
    }
}

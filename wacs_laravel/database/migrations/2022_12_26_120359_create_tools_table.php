<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tools', function (Blueprint $table) {
            $table->increments('id')->nullable()->comment('道具ID');
            $table->unsignedInteger('post_id')->nullable()->comment('投稿ID');

            $table->string('tool_name1')->nullable()->comment('道具名1');
            $table->string('tool_name2')->nullable()->comment('道具名2');
            $table->string('tool_name3')->nullable()->comment('道具名3');
            $table->string('tool_name4')->nullable()->comment('道具名4');
            $table->string('tool_name5')->nullable()->comment('道具名5');
            $table->string('tool_name6')->nullable()->comment('道具名6');
            $table->string('tool_name7')->nullable()->comment('道具名7');
            $table->string('tool_name8')->nullable()->comment('道具名8');
            $table->string('tool_name9')->nullable()->comment('道具名9');
            $table->string('tool_name10')->nullable()->comment('道具名10');

            $table->timestamps();

            // FK設定
            $table->foreign('post_id')//materialテーブルのpost_id
                ->references('id')//postテーブルのpost_id
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
        Schema::dropIfExists('tools');
    }
}

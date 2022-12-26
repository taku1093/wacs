<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->increments('id')->nullable()->comment('材料ID');
            $table->unsignedInteger('post_id')->nullable()->comment('投稿ID');
            $table->string('material_name1')->nullable()->comment('材料名1');
            $table->string('material_name2')->nullable()->comment('材料名2');
            $table->string('material_name3')->nullable()->comment('材料名3');
            $table->string('material_name4')->nullable()->comment('材料名4');
            $table->string('material_name5')->nullable()->comment('材料名5');
            $table->string('material_name6')->nullable()->comment('材料名6');
            $table->string('material_name7')->nullable()->comment('材料名7');
            $table->string('material_name8')->nullable()->comment('材料名8');
            $table->string('material_name9')->nullable()->comment('材料名9');
            $table->string('material_name10')->nullable()->comment('材料名10');

            $table->integer('material_num')->nullable()->comment('数量');

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
        Schema::dropIfExists('materials');
    }
}

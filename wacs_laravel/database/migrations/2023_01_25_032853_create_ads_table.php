<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->char('ad_img_path')->comment('イメージ画像パス');
            $table->string('ad_name')->comment('企業名');
            $table->string('ad_url')->comment('広告URL');
            $table->string('ad_message')->nullable()->comment('メモ');
            $table->timestamp('ad_finish')->comment('終了日');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}

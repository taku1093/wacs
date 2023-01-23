<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRankingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rankings', function (Blueprint $table) {
            $table->increments('id')->comment('ランキングの期間ID');
            $table->datetime('week_start')->comment('週期間');
            $table->datetime('week_finish')->comment('週期間');
            $table->datetime('month_start')->comment('月期間');
            $table->datetime('month_finish')->comment('月期間');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rankings');
    }
}

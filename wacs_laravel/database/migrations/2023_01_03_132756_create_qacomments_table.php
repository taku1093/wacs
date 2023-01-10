<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQacommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qacomments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('is_deleted', 4)->default('0');
            $table->integer('qapost_id');
            $table->string('name');
            $table->text('qacomment');

            // $table->bigIncrements('id');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qacomments');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQapostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qaposts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();   // created_at, updated_atが自動設定されるとのこと
            $table->string('is_deleted', 4)->default('0');
            $table->integer('qacategory_id');
            $table->string('subject');
            $table->text('message');
            $table->string('name');

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
        Schema::dropIfExists('qaposts');
    }
}

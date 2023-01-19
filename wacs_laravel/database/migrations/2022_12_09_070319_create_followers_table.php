<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followers', function (Blueprint $table) {
            $table->increments('id')->nullable()->comment('フォローID');
            $table->unsignedInteger('following_id')->comment('フォローしているユーザID');
            $table->unsignedInteger('followed_id')->comment('フォローされているユーザID');

            $table->index('following_id');
            $table->index('followed_id');

            $table->timestamps();

            $table->unique([
                'following_id',
                'followed_id'
            ]);

            $table->foreign('following_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('followed_id')
            ->references('id')
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
        Schema::dropIfExists('followers');
    }
}

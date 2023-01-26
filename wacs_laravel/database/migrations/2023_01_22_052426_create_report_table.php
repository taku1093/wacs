<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id')->comment('問い合わせID');
            $table->string('report_name')->comment('問い合わせ氏名');
            $table->string('report_mail')->comment('メールアドレス');
            $table->string('report_tell')->nullable()->comment('電話番号');
            $table->string('report_kind')->comment('問い合わせ種別');
            $table->string('report_about')->nullable()->comment('問い合わせの者について');
            $table->string('report_text')->nullable()->comment('問い合わせ内容');
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
        Schema::dropIfExists('reports');
    }
}

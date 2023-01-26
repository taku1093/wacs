<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->char('coupon_img_path')->comment('イメージ画像パス');
            $table->char('coupon_qr_path')->comment('QR画像パス');
            $table->string('coupon_name')->comment('クーポン名');
            $table->string('coupon_comp_name')->comment('企業名');
            $table->string('coupon_code')->comment('クーポンコード');
            $table->string('coupon_message')->nullable()->comment('クーポン詳細');
            $table->datetime('coupon_start')->comment('開始日');
            $table->datetime('coupon_finish')->comment('終了日');
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
        Schema::dropIfExists('coupons');
    }
}

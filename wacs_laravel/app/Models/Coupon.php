<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'coupon_img_path',
        'coupon_qr_path',
        'coupon_name',
        'coupon_comp_name',
        'coupon_code',
        'coupon_message',
        'coupon_start',
        'coupon_finish'
    ];
}

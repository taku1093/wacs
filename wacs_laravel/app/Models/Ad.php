<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    //
    protected $fillable = [
        'ad_img_path',
        'ad_name',
        'ad_url',
        'ad_message',
        'ad_finish',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    //
    protected $fillable = [
        'week_start',
        'week_finish',
        'month_start',
        'month_finish'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $fillable = [
        'report_name',
        'report_mail',
        'report_tell',
        'report_kind',
        'report_about',
        'report_text'
    ];
}

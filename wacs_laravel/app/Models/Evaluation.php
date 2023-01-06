<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Evaluation extends Model
{
    //
    protected $fillable = [
        'user_id',
        'eval_number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getEvaluation(Int $post_id)
    {
        return $this->with('user')->where('id', $post_id)->first();
    }

    // カウント
    public function getCountByUser()
    {
        return Evaluation::select('user_id')
                ->selectRaw('AVG(eval_number) AS eval_ave')
                ->groupBy('user_id')
                ->get();
    }
}

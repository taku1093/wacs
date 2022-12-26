<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    //
    protected $fillable = [
        'material_id',
        'material_name',
        'material_num'
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function materialStore(Int $post_id, Array $data)
    {
        $this->post_id = $post_id;
        $this->material_name = $data['material_name'];
    
        $this->save();

        return;
    }

}

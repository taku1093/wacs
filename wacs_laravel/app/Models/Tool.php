<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    //
    protected $fillable = [
        'tool_name1',
        'tool_name2',
        'tool_name3',
        'tool_name4',
        'tool_name5',
        'tool_name6',
        'tool_name7',
        'tool_name8',
        'tool_name9',
        'tool_name10',

    ];
    
    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function toolStore(Int $post_id, Array $data, Request $request)
    {
        $this->post_id = $post_id;
        
        // $this->material_name = $data['material_name'];
        // 材料
        if ($request->has("tool_name10")){
                $this->tool_name10 = $data['tool_name10'];
        }
        if($request->has("tool_name9")){
                $this->tool_name9 = $data['tool_name9'];
        }
        if($request->has("tool_name8")){
                $this->tool_name8 = $data['tool_name8'];
        }
        if($request->has("tool_name7")){
                $this->tool_name7 = $data['tool_name7'];
        }
        if($request->has("tool_name6")){
                $this->tool_name6 = $data['tool_name6'];
        }
        if($request->has("tool_name5")){
                $this->tool_name5 = $data['tool_name5'];
        }
        if($request->has("tool_name4")){
                $this->tool_name4 = $data['tool_name4'];
        }
        if($request->has("tool_name3")){
                $this->tool_name3 = $data['tool_name3'];
        }
        if($request->has("tool_name2")){
                $this->tool_name2 = $data['tool_name2'];
        }
        if($request->has("tool_name1")){
            $this->tool_name1 = $data['tool_name1'];
        }
        $this->save();

        return;
    }
}

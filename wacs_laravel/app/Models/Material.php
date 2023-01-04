<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    //
    protected $fillable = [
        'material_id',
        'material_name1',
        'material_name2',
        'material_name3',
        'material_name4',
        'material_name5',
        'material_name6',
        'material_name7',
        'material_name8',
        'material_name9',
        'material_name10',
        'material_num1',
        'material_num2',
        'material_num3',
        'material_num4',
        'material_num5',
        'material_num6',
        'material_num7',
        'material_num8',
        'material_num9',
        'material_num10',

];

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function materialStore(Int $post_id, Array $data, Request $request)
    {
        $this->post_id = $post_id;
        
        // $this->material_name = $data['material_name'];
        // 材料
        if ($request->has("material_name10")){
                $this->material_name10 = $data['material_name10'];
        }
        if($request->has("material_name9")){
                $this->material_name9 = $data['material_name9'];
        }
        if($request->has("material_name8")){
                $this->material_name8 = $data['material_name8'];
        }
        if($request->has("material_name7")){
                $this->material_name7 = $data['material_name7'];
        }
        if($request->has("material_name6")){
                $this->material_name6 = $data['material_name6'];
        }
        if($request->has("material_name5")){
                $this->material_name5 = $data['material_name5'];
        }
        if($request->has("material_name4")){
                $this->material_name4 = $data['material_name4'];
        }
        if($request->has("material_name3")){
                $this->material_name3 = $data['material_name3'];
        }
        if($request->has("material_name2")){
                $this->material_name2 = $data['material_name2'];
        }
        if($request->has("material_name1")){
            $this->material_name1 = $data['material_name1'];
        }
        // 数量
        if ($request->has("material_num10")){
                $this->material_num10 = $data['material_num10'];
        }
        if($request->has("material_num9")){
                $this->material_num9 = $data['material_num9'];
        }
        if($request->has("material_num8")){
                $this->material_num8 = $data['material_num8'];
        }
        if($request->has("material_num7")){
                $this->material_num7 = $data['material_num7'];
        }
        if($request->has("material_num6")){
                $this->material_num6 = $data['material_num6'];
        }
        if($request->has("material_num5")){
                $this->material_num5 = $data['material_num5'];
        }
        if($request->has("material_num4")){
                $this->material_num4 = $data['material_num4'];
        }
        if($request->has("material_name3")){
                $this->material_num3 = $data['material_num3'];
        }
        if($request->has("material_name2")){
                $this->material_num2 = $data['material_num2'];
        }
        if($request->has("material_name1")){
            $this->material_num1 = $data['material_num1'];
        }

        
    
        $this->save();

        return;
    }

        public function getMaterial(Int $material_id)
        {
                return $this->with('post')->where('post_id', $material_id)->get();
        }

}

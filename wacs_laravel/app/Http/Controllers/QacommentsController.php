<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\QacommentRequest; // ←★追加
use App\Models\Qacomment; //  ←★追加

class QacommentsController extends Controller
{
    /**
     * バリデーション、登録データの整形など
     */
    public function store(QacommentRequest $request)
    {
        $savedata = [
            'qapost_id' => $request->qapost_id,
            'name' => $request->name,
            'qacomment' => $request->qacomment,
        ];
 
        $qacomment = new Qacomment;
        $qacomment->fill($savedata)->save();
 
        return redirect()->route('qanda.show', [$savedata['qapost_id']])->with('commentstatus','コメントを投稿しました');
    }
}

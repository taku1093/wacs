<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Qapost, App\Models\Qacategory;
use App\Http\Requests\QapostRequest; // class宣言の外に追記

class QapostsController extends Controller
{
    
    // public function index(Request $request)
    // {
    //     // $sort = $request->sort;
    //     $qaposts = Qapost::paginate(10);
    //     // return view('list', ['qaposts' => $qaposts]);
    //     return view('qaposts',compact('data'));
    // }

    /**
     * 一覧
     */
    public function index(Request $request)
    {
        // カテゴリ取得
        $qacategory = new Qacategory;
        $qacategories = $qacategory->getLists();
        $searchword = $request->searchword;
    
        $qacategory_id = $request->qacategory_id;
        if (!is_null($qacategory_id)) {
            $qaposts = Qapost::where('qacategory_id', $qacategory_id)->orderBy('created_at', 'desc')->paginate(10);
        } else {
            // $qaposts = Qapost::orderBy('created_at', 'desc')->paginate(10);

            // scopeを利用した検索
            $qaposts = Qapost::orderBy('created_at', 'desc')
            ->categoryAt($qacategory_id)
            // ->fuzzyName($searchword)
            ->fuzzyNameMessage($searchword)
            ->paginate(10);
        }
    
        return view('qanda.index', [
            'qaposts' => $qaposts, 
            'qacategories' => $qacategories, 
            'qacategory_id'=>$qacategory_id,
            'searchword' => $searchword,
        ]);
    }

    /**
 * 詳細
 */
    public function show(Request $request, $id)
    {
        $qapost = Qapost::findOrFail($id);
    
        return view('qanda.show', [
            'qapost' => $qapost,
        ]);
    }

    /**
     * 投稿フォーム
     */
    public function create()
    {
        //return view('posts.create');　← 間違い
        // return view('qanda.create');
        $qacategory = new Qacategory;
        $qacategories = $qacategory->getLists()->prepend('選択', '');
 
        return view('qanda.create', ['qacategories' => $qacategories]);
    }

    /**
     * バリデーション、登録データの整形など
     */
    public function store(QapostRequest $request)
    {
        $savedata = [
            'name' => $request->name,
            'subject' => $request->subject,
            'message' => $request->message,
            'qacategory_id' => $request->qacategory_id,
        ];
    
        $qapost = new Qapost;
        $qapost->fill($savedata)->save();
    
        return redirect('/qanda')->with('poststatus', '新規投稿しました');
    }

    /**
     * 編集画面
     */
    public function edit($qapost_id)
    {
        $qacategory = new Qacategory;
        $qacategories = $qacategory->getLists();

        $qapost = Qapost::findOrFail($qapost_id);
        return view('qanda.edit', ['qapost' => $qapost, 'qacategories' => $qacategories]);
    }

    /**
     * 編集実行
     */
    public function update(QapostRequest $request, $id)
    {
        $qapost = Qapost::findOrFail($id);
        $savedata = [
            // 'id' => $id,
            'name' => $request->name,
            'subject' => $request->subject,
            'message' => $request->message,
            'qacategory_id' => $request->qacategory_id,
        ];
    
        $qapost = new Qapost;
        // $qapost = Qapost::findOrFail($request->qapost->id);
        $qapost->fill($savedata)->save();
    
        return redirect('/qanda')->with('poststatus', '投稿を編集しました');
    }

    /**
     * 物理削除
     */
    public function destroy($id)
    {
    $qapost = Qapost::findOrFail($id);
    
    $qapost->qacomments()->delete(); // ←★コメント削除実行
    $qapost->delete();  // ←★投稿削除実行
    
    return redirect('/qanda')->with('poststatus', '投稿を削除しました');
    }
 
    
}

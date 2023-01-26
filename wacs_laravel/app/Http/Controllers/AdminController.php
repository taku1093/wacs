<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;
use App\Models\Report;
use App\Models\User;
use App\Models\Ad;
use App\Models\Coupon;
use App\Models\Ranking;

class AdminController extends Controller
{

    //indexメソッド
    public function home()
    {
        //管理者セキュリティ
        $user = Auth::user()->user_admin;
        $admin = 1;
        if ($user == $admin) {
            return view('admin.admi_home');
        }
        return redirect()->route('welcome');
    
        
    }

    public function post_manage()
    {
        $posts = Post::all();
        return view('admin.admi_post_management',['posts' => $posts]);
    }

    public function post_delete_ready($id)
    {
        #レコードをidで指定
        $post_data = Post::findOrFail($id);
 
        #viewに連想配列を渡す
        return view('admin.admi_post_delete_ready',['post_data' => $post_data]);
    }

    public function post_delete_comp($id)
    {
        #レコードをidで指定
        $post_data = new Post;
        $post_data->destroy($id);
 
        #viewに連想配列を渡す
        return view('admin.admi_post_delete_comp');
    }



    public function user_manage()
    {
        
        $users = User::all();
        return view('admin.admi_user_management',['users' => $users]);
    }

    public function user_edit($id)
    {
        #レコードをidで指定
        $user_data = User::findOrFail($id);
 
        #viewに連想配列を渡す
        return view('admin.admi_user_management_edit',['message' => '編集フォーム','user_data' => $user_data]);
    }

    public function user_delete_ready($id)
    {
        #レコードをidで指定
        $user_data = User::findOrFail($id);
 
        #viewに連想配列を渡す
        return view('admin.admi_user_delete_ready',['user_data' => $user_data]);
    }

    public function user_delete_comp($id)
    {
        #レコードをidで指定
        $user_data = new User;
        $user_data->destroy($id);
 
        #viewに連想配列を渡す
        return view('admin.admi_user_delete_comp');
    }



    public function ad_manage()
    {
        $ads = Ad::all();
        return view('admin.admi_ad_management',['ads' => $ads]);
    }

    public function ad_create(Request $request)
    {
        return view('admin.admi_ad_create');
    }

    public function ad_store(Request $request)
    {
        // 画像フォームでリクエストした画像を取得
        $ad_img_path = $request->file('ad_img_path');

        $ad_name = $request->ad_name;
        $ad_url = $request->ad_url;
        $ad_finish = $request->ad_finish;
        $ad_message = $request->ad_message;

        // 画像情報がセットされていれば、保存処理を実行
        if (isset($ad_img_path)) {
            // storage > public > img配下に画像が保存される
            $path = $ad_img_path->store('ad_img','public');
            // store処理が実行できたらDBに保存処理を実行
            if ($path) {
                // DBに登録する処理
                Ad::create([
                    'ad_img_path' => $path,
                    'ad_name' => $ad_name,
                    'ad_url' => $ad_url,
                    'ad_finish' => $ad_finish,
                    'ad_message' => $ad_message
                ]);
            }
        }
        return view('admin.admi_ad_store');
    }

    public function ad_edit($id)
    {
        #レコードをidで指定
        $ad_data = Ad::findOrFail($id);
 
        #viewに連想配列を渡す
        return view('admin.admi_ad_management_edit',['message' => '編集フォーム','ad_data' => $ad_data]);
    }

    public function ad_delete_ready($id)
    {
        #レコードをidで指定
        $ad_data = Ad::findOrFail($id);
 
        #viewに連想配列を渡す
        return view('admin.admi_ad_delete_ready',['ad_data' => $ad_data]);
    }

    public function ad_delete_comp($id)
    {
        #レコードをidで指定
        $ad_data = new Ad;
        $ad_data->destroy($id);
 
        #viewに連想配列を渡す
        return view('admin.admi_ad_delete_comp');
    }





    public function coupon_manage()
    {
        $coupons = Coupon::all();
        return view('admin.admi_coupon_management',['coupons' => $coupons]);
    }

    public function coupon_create(Request $request)
    {
        return view('admin.admi_coupon_create');
    }

    public function coupon_store(Request $request)
    {
        // 画像フォームでリクエストした画像を取得
        $coupon_img_path = $request->file('coupon_img_path');
        $coupon_qr_path = $request->file('coupon_qr_path');

        $coupon_name = $request->coupon_name;
        $coupon_comp_name = $request->coupon_comp_name;
        $coupon_code = $request->coupon_code;
        $coupon_start = $request->coupon_start;
        $coupon_finish = $request->coupon_finish;
        $coupon_message = $request->coupon_message;

        // 画像情報がセットされていれば、保存処理を実行
        if (isset($coupon_img_path) && isset($coupon_qr_path)) {
            // storage > public > img配下に画像が保存される
            $img_path = $coupon_img_path->store('coupon_img','public');
            $qr_path = $coupon_qr_path->store('qr_img','public');
            // store処理が実行できたらDBに保存処理を実行
            if ($img_path) {
                // DBに登録する処理
                Coupon::create([
                    'coupon_img_path' => $img_path,
                    'coupon_qr_path' => $qr_path,
                    'coupon_name' => $coupon_name,
                    'coupon_comp_name' => $coupon_comp_name,
                    'coupon_code' => $coupon_code,
                    'coupon_start' => $coupon_start,
                    'coupon_finish' => $coupon_finish,
                    'coupon_message' => $coupon_message
                ]);
            }
        }
        return view('admin.admi_coupon_store');
    }

    public function coupon_edit($id)
    {
        #レコードをidで指定
        $coupon_data = Coupon::findOrFail($id);
 
        #viewに連想配列を渡す
        return view('admin.admi_coupon_management_edit',['message' => '編集フォーム','coupon_data' => $coupon_data]);
    }

    public function coupon_delete_ready($id)
    {
        #レコードをidで指定
        $coupon_data = Coupon::findOrFail($id);
 
        #viewに連想配列を渡す
        return view('admin.admi_coupon_delete_ready',['coupon_data' => $coupon_data]);
    }

    public function coupon_delete_comp($id)
    {
        #レコードをidで指定
        $coupon_data = new Coupon;
        $coupon_data->destroy($id);
 
        #viewに連想配列を渡す
        return view('admin.admi_coupon_delete_comp');
    }





    public function ranking_manage()
    {   
        $id = 1;
        $ranking_data = Ranking::findOrFail($id);
        return view('admin.admi_ranking_management',['ranking_data' => $ranking_data]);
    }

    public function ranking_update_ready()
    {
        return view('admin.admi_ranking_update_ready');
    }

    public function ranking_update_comp(Request $request)
    {
        $id = 1;
        $ranking = Ranking::findOrFail($id);
        $ranking->week_start = $request->input('week_start');
        $ranking->week_finish = $request->input('week_finish');
        $ranking->month_start = $request->input('month_start');
        $ranking->month_finish = $request->input('month_finish');
        $ranking->save();
        #viewに連想配列を渡す
        return view('admin.admi_ranking_update_comp');
    }




    public function contact_manage()
    {
        $reports = Report::all();
        return view('admin.admi_contact_management',['reports' => $reports]);
    }

    public function contact_edit($id)
    {
        #レコードをidで指定
        $contact_data = Report::findOrFail($id);
 
        #viewに連想配列を渡す
        return view('admin.admi_contact_management_edit',['message' => '編集フォーム','contact_data' => $contact_data]);
    }

    public function contact_delete_ready($id)
    {
        #レコードをidで指定
        $contact_data = Report::findOrFail($id);
 
        #viewに連想配列を渡す
        return view('admin.admi_contact_delete_ready',['contact_data' => $contact_data]);
    }

    public function contact_delete_comp($id)
    {
        #レコードをidで指定
        $contact_data = new Report;
        $contact_data->destroy($id);
 
        #viewに連想配列を渡す
        return view('admin.admi_contact_delete_comp');
    }



    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

    

//<form action="upload.php" method="post" enctype="multipart/form-data">
  //    アップロードする画像ファイルを選択する:
    //  <input type="file" name="file">
      //<input type="submit" name="submit" value="Upload">
    //</form>

    //@for ($i = 0; $i < 5; $i++)
    
    //@endfor
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Report;

class contactController extends Controller
{
    //indexメソッド
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $report_name = $request->name;
        $report_mail = $request->email;
        $report_tell = $request->tel;
        $report_kind = $request->genre;
        $report_about = $request->user_type;
        $report_text = $request->message;



        // DBに登録する処理
        Report::create([
            'report_name' => $report_name,
            'report_mail' => $report_mail,
            'report_tell' => $report_tell,
            'report_kind' => $report_kind,
            'report_about' => $report_about,
            'report_text' => $report_text
        ]);
        return view('contact_store');

        // DB::beginTransaction();
        // try{
        //     $report = new Report($request->get('report',[
        //         'report_name' = $request->name,
        //         'report_mail' = $request->email,
        //         'report_tell' = $request->tel,
        //         'report_kind' = $request->genre,
        //         'report_about' = $request->user_type,
        //         'report_text' = $request->message
        //     ]));
        
        //     $report->save();
	
        // }catch(Exception $e){
        //     DB::rollback();
        //     return back()->withInput();
        // }
		  
        // DB::commit();
        // //return redirect
        // return view('contact_store');

    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use App\Models\Coupon;

class CouponController extends Controller
{
    //indexメソッド
    public function index()
    {
        //$user = Auth::user()->user_screen_name;
        $coupons = coupon::all();
        return view('coupon.coupon',['coupons' => $coupons]);
    }

}


<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Coupon;

class AdminProfileCouponsController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','admin']);
    }

    public function showCouponList(){

        $coupons=Coupon::all();

        return view('admin.coupons',['coupons'=>$coupons]);
    }

    public function addCoupon(Request $request){


        $request->validate([
            'code' => ['required', 'string'],
            'count' => ['required', 'integer'],
            'num_of_quizes' => ['required', 'integer']
            
            
        ]);

        $data=$request->all();

        $question=Coupon::create([
            'code'=>$data['code'],
            'count'=>$data['count'],
            'num_of_quizes'=>$data['num_of_quizes'],
            'remain'=>$data['count'],
            

        ]);

        return redirect(route('get-admin-profile-coupon'));

    }

    public function removeCoupon(){
        
    }
}

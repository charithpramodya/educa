<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Coupon;
use Auth;

class StudentProfileCouponController extends Controller
{

    public function __construct(){
        $this->middleware(['auth','student']);
    }

    public function validateCoupon(Request $request){

        $coupon_code=$request->input('coupon');

        $coupon=Coupon::where('code',$coupon_code)->where('remain','!=',0)->first();
        $student=Auth::user()->student()->first();

        if(!is_null($coupon)){
            
            $coupon_is_available=$student->coupons->find($coupon->id);

            if(is_null($coupon_is_available)){

                $coupon->remain -=1;
                $coupon->save();

                $student->free_quizes += $coupon->num_of_quizes;
                $student->save();

                

                
                $student->coupons()->attach($coupon);


                

                return "You have ".$student->free_quizes." free quizes.";
            }else{

                return "You already entered this Coupon";
            }

        }else{
            
            return "Coupon is not valid";
        }
        


    }

    public function showCoupon(){
        return view('student.coupon');
    }
    


}

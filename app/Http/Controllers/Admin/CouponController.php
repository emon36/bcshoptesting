<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PharIo\Manifest\CopyrightElement;


class CouponController extends Controller
{
    public function couponCreatePage()
    {
        $code = strtoupper(Str::random(13));
        return view('admin.pages.coupon.pages.CreateCoupon', ['code' => $code]);
    }

    public function store(Request $request){


        $coupon  = new Coupon();
        $coupon->title = $request->title;
        $coupon->code = $request->code;
        $coupon->discount = $request->discount;
        $coupon->save();

        return redirect()->back()->with('success', 'Coupon Created Successfully');

    }

    public  function index(){

        $coupons = Coupon::all();
        return view('admin.pages.coupon.pages.IndexPage', ['coupons' => $coupons]);

    }

    public function edit($id){
        $coupon = Coupon::find($id);
        return view('admin.pages.coupon.pages.UpdateCoupon', ['coupon' => $coupon]);
    }

    public function update(Request $request, $id){
        $coupon = Coupon::find($id);
        $coupon->title = $request->title;
        $coupon->code = $request->code;
        $coupon->discount = $request->discount;
        $coupon->update();

        return redirect()->back()->with('success', 'Coupon Updated Successfully');
    }

    public function statusChange(Request $request){

        $coupon = Coupon::find($request->coupon_id);
        $coupon->status = $request->status;
        $coupon->update();
        return response()->json(['success' => 'Status Changed Successfully']);
    }
}

<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\OrderCommission;
use App\Models\OrderDetails;
use App\Models\PreOrderCart;
use App\Models\Shipping;
use App\Models\ShippingCharges;
use App\Models\Vendor;
use App\Models\VendorAccounts;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PreOrderController extends Controller
{
    public  function preOrderCart(Request $request){

        if (session()->get('user') == NUll){
            return response()->json(['status' => 'please login']);
        }
        else{
            $product_id = $request->input('product_id');
            $vendor_id = $request->input('vendor_id');
            $quantity = $request->input('quantity');
            $customer_id = session()->get('user')->id;

            $productExist = PreOrderCart::where('product_id', $product_id)->where('customer_id', $customer_id)->first();

            if ($productExist) {
                return response()->json(['status' => 'you have already added product']);
            } else {
                $cartItem = new PreOrderCart();
                $cartItem->product_id = $product_id;
                $cartItem->vendor_id = $vendor_id;
                $cartItem->customer_id = $customer_id;
                $cartItem->quantity = $quantity;
                $cartItem->save();
            }

            $cartCount = PreOrderCart::where('customer_id', $customer_id)->get()->count();

            return response()->json(['cartCount' => $cartCount, 'status' => 'Successfully added to card']);
        }

    }

    public function preOrderCheckout(){
        $carts = PreOrderCart::with('product')->where('customer_id', session()->get('user')->id)->get();

        $divisions = Division::all();
        $districts = District::all();
        $upazilas = Upazila::all();
        $shippingCharge = ShippingCharges::where('id', 1)->first();

        return view('web.pages.PreOrderCheckout',
            ['carts' => $carts,
                'divisions' => $divisions,
                'districts' => $districts,
                'upazilas' => $upazilas,
                'shippingCharge' => $shippingCharge,
            ]);
    }

    public function customerPlacePreOrder(){
        $carts = PreOrderCart::with('product')->where('customer_id', session()->get('user')->id)->get();
        $shippingCharge = ShippingCharges::where('id', 1)->first();

      

    }

}

<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\Cart;
use App\Models\GuestCart;
use App\Models\Order;
use App\Models\OrderCommission;
use App\Models\OrderDetails;
use App\Models\Shipping;
use App\Models\ShippingCharges;
use App\Models\Vendor;
use App\Models\VendorAccounts;
use Illuminate\Http\Request;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class CheckoutController extends Controller
{


    public function checkoutPage()
    {

        if ( session()->get('user') == NUll)
        {
            return  redirect()->route('Customer.LoginPage', [
                'rdrto' => url()->full()
            ]);
        }else {

            $carts = Cart::with('product')->where('customer_id', session()->get('user')->id)->get();

            $divisions = Division::all();
            $districts = District::all();
            $upazilas = Upazila::all();
            $shippingCharge = ShippingCharges::where('id', 1)->first();

            return view('web.pages.Checkout',
                ['carts' => $carts,
                    'divisions' => $divisions,
                    'districts' => $districts,
                    'upazilas' => $upazilas,
                    'shippingCharge' => $shippingCharge,
                ]);
        }

    }

    public function customerPlaceOrder(Request $request)
    {

        if ($request->payment_type == 'Cash On Delivery') {
            $shippingCharge = ShippingCharges::where('id', 1)->first();

            $carts = Cart::with('product')->where('customer_id', session()->get('user')->id)->get();

            foreach ($carts as $cart) {
                $order = new Order();
                $order->order_number = mt_rand(1000000000, 9999999999);

                if(Session::has('coupon'))
                {
                    $total = $cart->product->current_selling_price * $cart->quantity;
                    $discount = Session::get('coupon')['discount'];
                    $discountAmount = $discount / 100 * $total;
                    $currentPrice = $total - $discountAmount;
                    $order->subtotal = $currentPrice + $shippingCharge->amount*100;
                    $order->has_coupon = 1;
                    $order->coupon_discount = $discountAmount;
                }else{
                    $total = $cart->product->current_selling_price * $cart->quantity;
                    $order->subtotal = $total + $shippingCharge->amount*100;
                }
                $order->customer_id = session()->get('user')->id;
                $order->vendor_id = $cart->vendor_id;
                $order->save();

                $commission_rate = Vendor::where('id', $order->vendor_id)->first();
                if(Session::has('coupon')) //adjusting vendor commission amount if coupon applied
                {
                    $total = $cart->product->current_selling_price * $cart->quantity;
                    $discount = Session::get('coupon')['discount'];
                    $discountAmount = $discount / 100 * $total;
                    $commissionAmount = ($order->subtotal + $discountAmount) * ($commission_rate->commission / 100);
                }else{
                    $commissionAmount = $order->subtotal * ($commission_rate->commission / 100);
                }
                $orderCommission = new OrderCommission();
                $orderCommission->order_id = $order->id;
                $orderCommission->vendor_id = $cart->vendor_id;
                $orderCommission->commission_amount = $commissionAmount;
                $orderCommission->save();

                $vendorAccounts = VendorAccounts::where('id', $order->vendor_id)->first();
                $totalEarning = $vendorAccounts->total_earning + $order->subtotal;
                $vendorAccounts->total_earning = $totalEarning;
                $vendorAccounts->total_commission_given += $commissionAmount;
                $vendorAccounts->update();
                $vendorAccounts->payment_due = $vendorAccounts->total_earning - $vendorAccounts->total_commission_given;
                $vendorAccounts->update();


                $orderDetails = new OrderDetails();
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $cart->product_id;
                $orderDetails->vendor_id = $cart->vendor_id;
                $orderDetails->quantity = $cart->quantity;
                $orderDetails->size = $cart->size;
                $orderDetails->color = $cart->color;
                $orderDetails->unit_price = $cart->product->current_selling_price;
                if(Session::has('coupon'))
                {
                    $total = $cart->product->current_selling_price * $cart->quantity;
                    $discount = Session::get('coupon')['discount'];
                    $discountAmount = $discount / 100 * $total;
                    $currentPrice = $total - $discountAmount;
                    $orderDetails->subtotal = $currentPrice;
                }else{
                    $orderDetails->subtotal = $cart->product->current_selling_price * $cart->quantity;
                }
                $orderDetails->save();
                $cart->delete($cart->id);

                $shipping = new Shipping();

                $shipping->order_id = $order->id;
                $shipping->name = $request->name;
                $shipping->phone = $request->phone;
                $shipping->email = $request->email;
                $shipping->division = $request->division;
                $shipping->district = $request->district;
                $shipping->zip = $request->zip;
                $shipping->city = $request->city;
                $shipping->address = $request->address;
                $shipping->save();
            }

            if (Session::has('coupon')) {
                Session::forget('coupon');
            }

            return redirect()->route('Home')->with('success', 'Order place successfully');
        }

        else{

            $carts = Cart::with('product')->where('customer_id', session()->get('user')->id)->get();
            $shippingCharge = ShippingCharges::where('id', 1)->first();


            foreach ($carts as $cart) {

                $order = new Order();
                $order->order_number = mt_rand(1000000000, 9999999999);
                if(Session::has('coupon'))
                {
                    $total = $cart->product->current_selling_price * $cart->quantity;
                    $discount = Session::get('coupon')['discount'];
                    $discountAmount = $discount / 100 * $total;
                    $currentPrice = $total - $discountAmount;
                    $order->subtotal = $currentPrice + $shippingCharge->amount*100;
                    $order->has_coupon = 1;
                    $order->coupon_discount = $discountAmount;
                }else{
                    $total = $cart->product->current_selling_price * $cart->quantity;
                    $order->subtotal = $total + $shippingCharge->amount*100;
                }
                $order->customer_id = session()->get('user')->id;
                $order->vendor_id = $cart->vendor_id;
                $order->payment_type = 'Online';
                $order->save();


                $commission_rate = Vendor::where('id', $order->vendor_id)->first();
                $commissionAmount = $order->subtotal * ($commission_rate->commission / 100);
                $orderCommission = new OrderCommission();
                $orderCommission->order_id = $order->id;
                $orderCommission->vendor_id = $cart->vendor_id;
                $orderCommission->commission_amount = $commissionAmount;
                $orderCommission->save();

                $vendorAccounts = VendorAccounts::where('id', $order->vendor_id)->first();
                $totalEarning = $vendorAccounts->total_earning + $order->subtotal;
                $vendorAccounts->total_earning = $totalEarning;
                $vendorAccounts->total_commission_given += $commissionAmount;
                $vendorAccounts->update();
                $vendorAccounts->payment_due = $vendorAccounts->total_earning - $vendorAccounts->total_commission_given;
                $vendorAccounts->update();


                $orderDetails = new OrderDetails();
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $cart->product_id;
                $orderDetails->vendor_id = $cart->vendor_id;
                $orderDetails->quantity = $cart->quantity;
                $orderDetails->unit_price = $cart->product->current_selling_price;
                if(Session::has('coupon'))
                {
                    $total = $cart->product->current_selling_price * $cart->quantity;
                    $discount = Session::get('coupon')['discount'];
                    $discountAmount = $discount / 100 * $total;
                    $currentPrice = $total - $discountAmount;
                    $orderDetails->subtotal = $currentPrice;
                }else{
                    $orderDetails->subtotal = $cart->product->current_selling_price * $cart->quantity;
                }
                $orderDetails->save();
                $cart->delete($cart->id);

                $shipping = new Shipping();

                $shipping->order_id = $order->id;
                $shipping->name = $request->name;
                $shipping->phone = $request->phone;
                $shipping->email = $request->email;
                $shipping->division = $request->division;
                $shipping->district = $request->district;
                $shipping->zip = $request->zip;
                $shipping->city = $request->city;
                $shipping->address = $request->address;
                $shipping->save();

                $post_data = array();
                $post_data['total_amount'] = $order->subtotal/100; # You cant not pay less than 10
                $post_data['currency'] = "BDT";
                $post_data['tran_id'] =  mt_rand(1000000000, 9999999999);  // tran_id must be unique

                # CUSTOMER INFORMATION
                $post_data['cus_name'] = 'Customer Name';
                $post_data['cus_email'] = 'customer@mail.com';
                $post_data['cus_add1'] = 'Customer Address';
                $post_data['cus_add2'] = "";
                $post_data['cus_city'] = "";
                $post_data['cus_state'] = "";
                $post_data['cus_postcode'] = "";
                $post_data['cus_country'] = "Bangladesh";
                $post_data['cus_phone'] = '8801XXXXXXXXX';
                $post_data['cus_fax'] = "";

                # SHIPMENT INFORMATION
                $post_data['ship_name'] = "Store Test";
                $post_data['ship_add1'] = "Dhaka";
                $post_data['ship_add2'] = "Dhaka";
                $post_data['ship_city'] = "Dhaka";
                $post_data['ship_state'] = "Dhaka";
                $post_data['ship_postcode'] = "1000";
                $post_data['ship_phone'] = "";
                $post_data['ship_country'] = "Bangladesh";

                $post_data['shipping_method'] = "NO";
                $post_data['product_name'] = "Computer";
                $post_data['product_category'] = "Goods";
                $post_data['product_profile'] = "physical-goods";

                # OPTIONAL PARAMETERS
                $post_data['value_a'] = $order->id;
                $post_data['value_b'] = "ref002";
                $post_data['value_c'] = "ref003";
                $post_data['value_d'] = "ref004";

                #Before  going to initiate the payment order status need to insert or update as Pending.
                $update_product = DB::table('order_transactions')
                    ->where('transaction_id', $post_data['tran_id'])
                    ->updateOrInsert([
                        'order_id' => $order->id,
                        'amount' => $post_data['total_amount'],
                        'status' => 'Pending',
                        'transaction_id' => $post_data['tran_id'],
                        'currency' => $post_data['currency']
                    ]);

                $sslc = new SslCommerzNotification();
                # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
                $payment_options = $sslc->makePayment($post_data, 'hosted');

                if (!is_array($payment_options)) {
                    print_r($payment_options);
                    $payment_options = array();
                }
            }



        }
    }


    public function applyCoupon(Request $request){
        $code = $request->code;
        $check = DB::table('coupons')->where('code',$code)->where('status', 'Active')->first();
        if($check){
            Session::put('coupon',[
                'code'  => $check->code,
                'discount' => $check->discount,
            ]);

            return Redirect()->back()->with('success', 'coupon added successfully');
        }else{
            return Redirect()->back()->with('error', 'coupon invalid or expired');
        }
    }

    public function removeCoupon(){
        Session::forget('coupon');
        return Redirect()->back()->with('success', 'coupon removed successfully');
    }


}

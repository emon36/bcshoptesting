<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Courier;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Shipping;
use App\Models\Vendor;
use Illuminate\Http\Request;
use function Symfony\Component\Mime\Header\get;

class OrderController extends Controller
{
    public function  orderIndex()
    {
        $vendor = Vendor::where('owner_id', session()->get('user')->id)->first();
        $vendorId = $vendor->id;

        $orders = Order::with('orderDetails' , 'shipping')->where('vendor_id', $vendorId)->orderBy('id', 'desc')->paginate(10);

        return view('vendor.pages.order.pages.OrderIndex', ['orders' => $orders]);
    }

    public function orderView($id)
    {
        $vendor = Vendor::where('owner_id', session()->get('user')->id)->first();
        $vendorId = $vendor->id;

        $order = Order::with('customers', 'courier')->where('id',$id)->where('vendor_id',$vendorId)->get();

        $courier = Courier::where('order_id', $id )->first();

        $orderDetails = OrderDetails::with('products')->where('order_id', $id)->where('vendor_id', $vendorId)->get();
        $shipping = Shipping::where('order_id',$id)->first();

        return view('vendor.pages.order.pages.OrderView',['order'=> $order,'orderDetails' => $orderDetails, 'shipping' => $shipping, 'courier' => $courier]);
    }

    public function orderStatusChange(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request->status;
        $order->update();
        return redirect()->back()->with('success', 'Successfully Changes Status');
    }

    public function orderDeliveryStatus(Request $request, $id)
    {
        $order = Order::find($id);
        $order->delivery_status = $request->delivery_status;
        $order->update();
        return redirect()->back()->with('success', 'Successfully Changes Delivery Status');
    }

    public function addCourier(Request $request, $id)
    {
        $courier = new Courier();
        $courier->order_id = $id;
        $courier->name = $request->name;
        $courier->details = $request->details;
        $courier->save();

        return redirect()->back();
    }
}

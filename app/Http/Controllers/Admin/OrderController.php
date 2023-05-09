<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courier;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Shipping;
use App\Models\User;
use Illuminate\Http\Request;
use function League\Flysystem\get;

class OrderController extends Controller
{
    public function orderIndexPage()
    {
        $orders = Order::with('shipping', 'orderDetails', 'vendor')->get();

        return view('admin.pages.order.pages.IndexOrder', ['orders' => $orders]);
    }

    public function pendingOrder()
    {
        $orders = Order::with('shipping', 'orderDetails', 'vendor')->where('status', 'Pending')->get();
        return view('admin.pages.order.pages.PendingOrderList', ['orders' => $orders]);
    }

    public function approveOrder()
    {
        $orders = Order::with('shipping', 'orderDetails', 'vendor')->where('status', 'Approved')->get();
        return view('admin.pages.order.pages.ApproveOrderList', ['orders' => $orders]);
    }

    public function orderView($id)
    {
        $order = Order::with('customers',  'courier', 'vendor')->where('id',$id)->get();

        $courier = Courier::where('order_id', $id )->first();

        $orderDetails = OrderDetails::with('products')->where('order_id', $id)->get();
        $shipping = Shipping::where('order_id',$id)->first();

        return view('admin.pages.order.pages.ViewOrder',['order'=> $order,'orderDetails' => $orderDetails, 'shipping' => $shipping, 'courier' => $courier]);

    }

    public function orderStatus(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request->status;
        $order->update();
        return redirect()->back()->with('success', 'Successfully Changed Status');
    }

    public function deliveryStatus(Request $request, $id)
    {
        $order = Order::find($id);
        $order->delivery_status = $request->delivery_status;
        $order->update();
        return redirect()->back()->with('success', 'Successfully Changed Status');
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

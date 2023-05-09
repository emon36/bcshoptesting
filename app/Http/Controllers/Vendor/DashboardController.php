<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\VendorAccounts;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function dashboardPage()
    {
        $vendor = Vendor::where('owner_id', session()->get('user')->id)->first();
        $vendorId = $vendor->id;

        $todayOrder = Order::where('vendor_id', $vendorId)->whereDate('created_at', Carbon::today())->count();
        $currentWeekOrder = Order::where('vendor_id', $vendorId)->whereBetween('created_at', [Carbon::now()->startOfWeek(Carbon::SUNDAY), Carbon::now()->endOfWeek(Carbon::SATURDAY)])->count();
        $currentMonthOrders = Order::where('vendor_id', $vendorId)->whereMonth('created_at', Carbon::now()->month)->count();
        $currentYearOrders = Order::where('vendor_id', $vendorId)->whereYear('created_at', Carbon::now()->year )->count();



        $totalOrderDeliver = Order::where('vendor_id', $vendorId)->where('delivery_status', 'Delivered')->count();
        $totalPendingOrder = Order::where('vendor_id', $vendorId)->where('status', 'Pending')->count();
        $totalProductSale = OrderDetails::where('vendor_id', $vendorId)->sum('quantity');
        $totalPendingProduct  = Product::where('vendor_id', $vendorId)->where('status', 'Pending')->count();

        $latestOrder = Order::where('vendor_id', $vendorId)->latest()->take(5)->get();

        $vendorAccount = VendorAccounts::where('vendor_id', $vendorId)->first();
        $pendingWithdraw = WithdrawRequest::where('vendor_id', $vendorId)->where('status', 'Pending')->sum('amount');

        return view('vendor.pages.dashboard.Dashboard', [
            'todayOrder' => $todayOrder,
            'currentWeekOrder' => $currentWeekOrder,
            'currentYearOrders' => $currentYearOrders,
            'currentMonthOrders' => $currentMonthOrders,
            'totalOrderDeliver'  => $totalOrderDeliver,
            'totalPendingOrder'  => $totalPendingOrder,
            'totalPendingProduct' => $totalPendingProduct,
            'totalProductSale'    => $totalProductSale,
            'latestOrder'        => $latestOrder,
            'vendorAccount'      => $vendorAccount,
            'pendingWithdraw'  => $pendingWithdraw
        ]);
    }
}

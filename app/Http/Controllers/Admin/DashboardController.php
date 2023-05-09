<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderCommission;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCustomers = User::where('base_role', 'customer')->count();
        $totalSellers = User::where('base_role', 'vendor')->count();
        $todayOrder = Order::whereDate('created_at', Carbon::today())->count();
        $currentWeekOrder = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(Carbon::SUNDAY), Carbon::now()->endOfWeek(Carbon::SATURDAY)])->count();
        $currentMonthOrders = Order::whereMonth('created_at', Carbon::now()->month)->count();
        $totalPendingOrder = Order::where('status', 'Pending')->count();
        $currentYearOrders = Order::whereYear('created_at', Carbon::now()->year )->count();
        $totalPendingProducts = Product::where('status', 'Pending')->where('existence','Active')->count();


        $recentOrders = Order::latest()->take(10)->get();

        return view('admin.pages.dashboard.Dashboard', [
            'totalCustomers' => $totalCustomers,
            'totalSellers' => $totalSellers,
            'todayOrder' => $todayOrder,
            'currentMonthOrders' => $currentMonthOrders,
            'currentWeekOrder' => $currentWeekOrder,
            'currentYearOrders' => $currentYearOrders,
            'totalPendingOrder' => $totalPendingOrder,
            'recentOrders' => $recentOrders,
            'totalPendingProducts' => $totalPendingProducts,

        ]);
    }

    public function income()
    {
        $todayCommission = OrderCommission::whereDate('created_at', Carbon::today())->sum('commission_amount');
        $weekCommission = OrderCommission::whereBetween('created_at', [Carbon::now()->startOfWeek(Carbon::SUNDAY), Carbon::now()->endOfWeek(Carbon::SATURDAY)])->sum('commission_amount');
        $currentMonthCommission =  OrderCommission::whereMonth('created_at', Carbon::now()->month)->sum('commission_amount');
        $yearlyCommission = OrderCommission::whereYear('created_at', Carbon::now()->year )->sum('commission_amount');

        $todayCustomerPaid = Order::whereDate('created_at', Carbon::today())->sum('subtotal');
        $weekCustomerPaid = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(Carbon::SUNDAY), Carbon::now()->endOfWeek(Carbon::SATURDAY)])->sum('subtotal');
        $monthCustomerPaid = Order::whereMonth('created_at', Carbon::now()->month)->sum('subtotal');
        $yearCustomerPaid = Order::whereYear('created_at', Carbon::now()->year )->sum('subtotal');;

        return view('admin.pages.income.Income',
        [
            'todayCommission' => $todayCommission,
            'weekCommission' => $weekCommission,
            'currentMonthCommission' => $currentMonthCommission,
            'yearlyCommission' => $yearlyCommission,

            'todayCustomerPaid' => $todayCustomerPaid,
            'weekCustomerPaid' => $weekCustomerPaid,
            'monthCustomerPaid' =>  $monthCustomerPaid,
            'yearCustomerPaid' => $yearCustomerPaid
        ]);
    }
}

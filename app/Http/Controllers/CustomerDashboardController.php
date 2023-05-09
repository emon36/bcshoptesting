<?php

namespace App\Http\Controllers;

use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\SupportTicket;
use App\Models\User;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    public function dashboard()
    {
        $customerId = session()->get('user')->id;
        $orders = Order::with('orderDetails.products' )->where('customer_id', $customerId )->get();
        $divisions = Division::all();
        $districts = District::all();
        $address = CustomerAddress::where('customer_id', $customerId)->first();
        $customer = User::where('id', $customerId)->first();
        $supportTickets = SupportTicket::where('customer_id',  $customerId)->get();


        return view('web.pages.CustomerDashboard', ['orders' => $orders,
            'divisions' => $divisions,
            'districts' => $districts,
            'address'   => $address,
            'customer'  => $customer,
            'supportTickets' => $supportTickets
        ]);
    }
}

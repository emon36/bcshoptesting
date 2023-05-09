<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Vendor;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function customerReviewList()
    {
        $vendor = Vendor::where('owner_id', session()->get('user')->id)->first();
        $vendorId = $vendor->id;
        $reviews = Review::with('product', 'customer')->where('vendor_id', $vendorId)->get();


        return view('vendor.pages.customer.pages.customerReviewList', ['reviews' => $reviews]);
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\web\ReviewController;
use App\Models\Review;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customerReviewList()
    {
        $reviews = Review::with('product', 'customer')->get();

        return view('admin.pages.customer.pages.customerReviewList', ['reviews' => $reviews]);
    }

    public function reviewStatus(Request $request)
    {
        $review = Review::find($request->review_id);
        $review->status = $request->status;
        $review->update();
        return response()->json(['success' => 'Status Changed Successfully']);
    }
}

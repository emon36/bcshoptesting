<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function reviewStore(Request $request){
        $review = new Review();
        $review->customer_id = $request->customer_id;
        $review->product_id = $request->product_id;
        $review->vendor_id = $request->vendor_id;
        $review->order_id = $request->order_id;
        $review->star_rating = $request->star_rating;
        $review->comments = $request->comments;
        $review->save();
        return redirect()->back()->with('success','Your review has been submitted Successfully,');
    }
}

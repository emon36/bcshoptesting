<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function addToWishlist($id)
    {
        $userId = session()->get('user')->id;


        $check = Wishlist::where('user_id', $userId)->where('product_id', $id)->first();

        if ($userId) {
            if ($check != NULL) {
                return response()->json(['message' => 'Product already exists','status' => 400], 400);
            } else {
                $wishlist = new Wishlist();
                $wishlist->user_id = $userId;
                $wishlist->product_id = $id;
                $wishlist->save();
                return response()->json([
                    'message' => 'Product added to wishlist',
                    'success' => true
                ], 200);
            }
        } else {
            return response()->json(['error' => 'Please login First', 'status' => 401], 400);
        }


    }

    public function getWishList()
    {
        if (session()->get('user')) {
            $wishlists = Wishlist::with('product')->where('user_id', session()->get('user')->id)->get();
            return view('web.pages.Wishlist', ['wishlists' => $wishlists]);
        }
    }

    public function deleteWishlist($id)
    {
        $wishlist = Wishlist::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Wishlist deleted successfully');
    }
}

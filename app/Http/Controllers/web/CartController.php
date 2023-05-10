<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\GuestCart;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function CartPage()
    {
        return view('/web/pages/Cart');
    }

    public function addToCart(Request $request)
    {
        if (session()->get('user') == NUll) {
            $product_id = $request->input('product_id');
            $vendor_id = $request->input('vendor_id');
            $quantity = $request->input('vendor_id');
            $size = $request->input('size');

            $color = $request->input('color');
            $guestUserId = Cookie::get('__cart');

            if ($size == 'Select a Size'){
                return response()->json(['message' => 'Please Select a Size','status' => 400], 400);
            }
            if ($color == 'Select a Color'){
                return response()->json(['message' => 'Please Select a Color','status' => 400], 400);
            }

            $productExist = GuestCart::where('product_id', $product_id)->where('guest_user_id', $guestUserId)->first();
            if ($productExist) {
                $exists = GuestCart::find($productExist->id);
                $exists->quantity += 1;
                $exists->update();
            } else {
                $cartItem = new GuestCart();
                $cartItem->product_id = $product_id;
                $cartItem->vendor_id = $vendor_id;
                $cartItem->guest_user_id = $guestUserId;
                $cartItem->quantity = $quantity;
                $cartItem->size = $size;
                $cartItem->color = $color;
                $cartItem->save();

                $cartCount = GuestCart::where('guest_user_id', $guestUserId)->get()->count();

                return response()->json(['cartCount' => $cartCount, 'status' => 'Successfully added to card']);

            }

        } else {

            $product_id = $request->input('product_id');
            $vendor_id = $request->input('vendor_id');
            $quantity = $request->input('quantity');
            $customer_id = session()->get('user')->id;
            $size = $request->input('size');
            $color = $request->input('color');

            if ($size == 'Select a Size'){
                return response()->json(['message' => 'Please Select a Size','status' => 400], 400);
            }
            if ($color == 'Select a Color'){
                return response()->json(['message' => 'Please Select a Color','status' => 400], 400);
            }

            $productExist = Cart::where('product_id', $product_id)->where('size', $size)->where('color', $color)->where('customer_id', $customer_id)->first();

            if ($productExist) {
                $exists = Cart::find($productExist->id);
                $exists->quantity += 1;
                $exists->update();

            } else {
                $cartItem = new Cart();
                $cartItem->product_id = $product_id;
                $cartItem->vendor_id = $vendor_id;
                $cartItem->customer_id = $customer_id;
                $cartItem->quantity = $quantity;
                $cartItem->size = $size;
                $cartItem->color = $color;
                $cartItem->save();
            }

            $cartCount = Cart::where('customer_id', $customer_id)->get()->count();

            return response()->json(['cartCount' => $cartCount, 'status' => 'Successfully added to card']);
        }


    }

    public function cartCount()
    {
        if (session()->has('user'))
        {
            $customer_id = session()->get('user')->id;
            $cartCount = Cart::where('customer_id', $customer_id)->get()->count();
            return response()->json(['cartCount' => $cartCount]);
        }
        else{
            $guestUserId = Cookie::get('__cart');
            $cartCount = GuestCart::where('guest_user_id', $guestUserId)->get()->count();
            return response()->json(['cartCount' => $cartCount]);
        }

    }

    public function getCartItems()
    {

        if (session()->get('user')) {
            $carts = Cart::with('product')->where('customer_id', session()->get('user')->id)->get();
            return view('web.pages.Cart', ['carts' => $carts]);
        } else {
            $guestUserId = Cookie::get('__cart');
            $guestCarts = GuestCart::with('product')->where('guest_user_id', $guestUserId)->get();
            return view('web.pages.GuestCart', ['guestCarts' => $guestCarts]);
        }

    }

    public function updateCart(Request $request)
    {
        foreach ($request->id as $key => $value) {
            $data = array(
                'quantity'=>$request->quantity[$key],
            );
            Cart::where('id',$request->id[$key])
                ->update($data);
        }
        return redirect()->back()->with('success', 'cart quantity updated successfully');
    }

    public function deleteCart($id)
    {
        $cart = Cart::where('id', $id)->delete();
        return redirect()->back()->with('success', 'cart deleted successfully');
    }

    public function guestUpdateCart(Request $request)
    {
        foreach ($request->id as $key => $value) {
            $data = array(
                'quantity'=>$request->quantity[$key],
            );
            GuestCart::where('id',$request->id[$key])
                ->update($data);
        }
        return redirect()->back()->with('success', 'cart quantity updated successfully');
    }

    public function guestDeleteCart($id)
    {
        $cart = GuestCart::where('id', $id)->delete();
        return redirect()->back()->with('success', 'cart deleted successfully');
    }
}

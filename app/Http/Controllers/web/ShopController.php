<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shopPage(Request $request)
    {
        $products = Product::where('status', 'Approved')->where('existence', 'Active')->latest()->paginate(16);
        $categories = Category::all();

        if ($request->sort == 'price_high') {
            $products = Product::where('status', 'Approved')->where('existence', 'Active')->orderByDesc('current_selling_price')->paginate(16);
        } elseif ($request->sort == 'price_low') {
            $products = Product::where('status', 'Approved')->where('existence', 'Active')->orderBy('current_selling_price')->paginate(16);
        }else{
            $products = Product::where('status', 'Approved')->where('existence', 'Active')->latest()->paginate(16);
        }

        return view('web.pages.Shop',
        [
            'products' => $products,
            'categories' => $categories,
        ]
        );
    }


}

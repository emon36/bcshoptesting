<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Review;
use Request;


class ProductController extends Controller
{

    public function productSingleView($slug)
    {
        $product = Product::with('categories', 'images','vendor', 'attributes')->where('slug',$slug)->first();

        $productRatings = Review::where('product_id',$product->id)->where('status', 'Publish')->orderBy('id', 'desc')->get();

        $vendorProducts = Product::where('vendor_id', $product->vendor_id)->where('id','!=',$product->id)->where('status', 'Approved')
            ->where('existence', 'Active')->take(5)->get();

        $relatedProducts = Product::latest()->where('status', 'Approved')
            ->where('existence', 'Active')->take(5)->get();

        $moreProducts = Product::orderBy('id', 'desc')->take(3)->get();

        return view('web.pages.productSingle',['product' => $product, 'moreProducts' => $moreProducts, 'productRatings' => $productRatings, 'relatedProducts' => $relatedProducts, 'vendorProducts' => $vendorProducts]);
    }


    public function  categoryProductsView($id, $slug)
    {

        $category = Category::where('slug', $slug)->first();

        if(Request::get('sort') == 'price_asc')
        {
            $products = ProductCategory::with('product')
                ->join('products', 'product_categories.product_id' ,'=', 'products.id')
                ->orderBy('products.current_selling_price', 'asc')
                ->where('category_id', $id)
                ->get();
        }elseif (Request::get('sort') == 'price_desc')
        {
            $products = ProductCategory::with('product')
                ->join('products', 'product_categories.product_id' ,'=', 'products.id')
                ->orderBy('products.current_selling_price', 'desc')
                ->where('category_id', $id)
                ->get();
        }elseif (Request::get('sort') == 'latest')
        {
            $products = ProductCategory::with('product')
                ->join('products', 'product_categories.product_id' ,'=', 'products.id')
                ->orderBy('products.created_at', 'desc')
                ->where('category_id', $id)
                ->get();
        }
        else{
            $products = ProductCategory::with('category','product')->where('category_id', $id)->get();
        }

        return view('web.pages.CategoryWiseProduct', ['products' => $products, 'category' => $category]);
    }

}

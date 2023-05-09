<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\HomeBlock;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\Vendor;
use App\Services\Helpers\Converter;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use Converter;
    public function HomePage(){

        $categories = Category::get();
        $homeBlocks = HomeBlock::with('items')->get();
        $customList = [];

        $categoryTitle = 'Preorder Products';

//        $preorderRecentProducts = ProductCategory::whereHas('category', function ($query) use ($categoryTitle) {
//            $query->where('title', $categoryTitle);
//        })->with('product', function ($q){
//            $q->where('existence', 'Active')->orderBy('id', 'desc')->take(10);
//        })->get()->pluck('product');
//
//
//        $preorderPopularProducts = ProductCategory::whereHas('category', function ($query) use ($categoryTitle) {
//            $query->where('title', $categoryTitle);
//        })->with('product', function ($q){
//            $q->where('existence', 'Active')->inRandomOrder()->take(10);
//        })->get()->pluck('product');
//
//        $preorderFeatureProducts = ProductCategory::whereHas('category', function ($query) use ($categoryTitle) {
//            $query->where('title', $categoryTitle);
//        })->with('product', function ($q){
//            $q->where('existence', 'Active')->inRandomOrder()->take(10);
//        })->get()->pluck('product');



//        $recentProducts = Product::where('status', 'Approved')
//            ->where('existence', 'Active')
//            ->whereNotIn('id', function ($query) use ($categoryTitle) {
//                $query->select('product_id')
//                    ->from('product_categories')
//                    ->join('categories', 'product_categories.category_id', '=', 'categories.id')
//                    ->where('categories.title', $categoryTitle);
//            })
//            ->orderBy('id', 'desc')
//            ->take(10)
//            ->get();
//
//        $popularProductsRand = Product::where('status', 'Approved')
//            ->where('existence', 'Active')
//            ->whereNotIn('id', function ($query) use ($categoryTitle) {
//                $query->select('product_id')
//                    ->from('product_categories')
//                    ->join('categories', 'product_categories.category_id', '=', 'categories.id')
//                    ->where('categories.title', $categoryTitle);
//            })
//            ->inRandomOrder()
//            ->take(10)
//            ->get();
//
//        $featureProductsRand = Product::where('status', 'Approved')
//            ->where('existence', 'Active')
//            ->whereNotIn('id', function ($query) use ($categoryTitle) {
//                $query->select('product_id')
//                    ->from('product_categories')
//                    ->join('categories', 'product_categories.category_id', '=', 'categories.id')
//                    ->where('categories.title', $categoryTitle);
//            })
//            ->inRandomOrder()
//            ->take(10)
//            ->get();

        $recentProducts = Product::where('status', 'Approved')->where('existence', 'Active')->orderBy('id', 'desc')->take(10)->get();
        $popularProductsRand = Product::where('status', 'Approved')->where('existence', 'Active')->inRandomOrder()->take(10)->get();
        $featureProductsRand = Product::where('status', 'Approved')->where('existence', 'Active')->inRandomOrder()->take(10)->get();


        return view('web.pages.Home', [
            'homeBlocks' => $homeBlocks,
            'categories' => $categories,
            'recentProducts' => $recentProducts,
            'popularProductsRand' => $popularProductsRand,
            'featureProductsRand' => $featureProductsRand,

        ]);
    }

    public function productSearch(Request $request)
    {
        $search = $request->search;

        $products = Product::where('title', 'LIKE', '%'.$search.'%')->where('status','Approved')->where('existence', 'Active')->orderBy('id', 'desc')->paginate(10);

        return view('web.pages.ProductSearchPage', ['products' => $products]);

    }

    public function vendorList()
    {
        $vendors = Vendor::where('status', 'Approved')->paginate(6);
        return view('web.pages.VendorList', ['vendors' => $vendors]);
    }

    public function vendorDetails($url)
    {
        $vendor = Vendor::where('shop_url', $url)->first();
        $products = Product::with('vendor')->where('vendor_id', $vendor->id)->
            where('status', 'Approved')->where('existence', 'Active')->paginate(6);
        return view('web.pages.VendorDetails', ['vendor' => $vendor, 'products' => $products]);
    }

    public function privacyPolicyPage()
    {
        $page = Page::where('title', 'Privacy and Policies')->first();
        return view('web.pages.PrivacyPolicy', ['page' => $page]);
    }

    public function termsAndConditionPage()
    {
        $page = Page::where('title', 'Terms and Conditions')->first();
        return view('web.pages.TermsConditions', ['page' => $page]);
    }

    public function aboutUsPage()
    {
        $page = Page::where('title', 'About Us')->first();
        return view('web.pages.AboutUs', ['page' => $page] );
    }

    public function mobileError()
    {
        return view('admin.MobileError');
    }

    public function returnPolicy()
    {
        $page = Page::where('title', 'Product Return')->first();
        return view('web.pages.ReturnRefundPolicy', ['page' => $page]);
    }

    public function shippingPolicy()
    {
        $page = Page::where('title', 'Shipping Policy')->first();
        return view('web.pages.ShippingPolicy',  ['page' => $page]);
    }

    public function contactUsPage()
    {
        return view('web.pages.Contact');
    }

    public function contact(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();

        return redirect()->back()->with('success', 'Your message sent successfully');
    }
}

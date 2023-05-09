<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShopUpdate;
use App\Http\Requests\StoreVendor;
use App\Models\Vendor;
use Devfaysal\BangladeshGeocode\Models\District;
use Illuminate\Http\Request;

class VendorProfileController extends Controller
{
    public function viewShop()
    {
        $vendor = Vendor::where('owner_id', session()->get('user')->id)->first();
        return view('vendor.pages.shop.pages.ShopView', ['vendor' => $vendor]);

    }

    public function editShop($id)
    {
        $vendor = Vendor::find($id);
        $districts = District::all();
        return view('vendor.pages.shop.pages.EditShop', ['vendor' => $vendor, 'districts' => $districts]);
    }

    public function updateShopDetails(ShopUpdate $request, $id)
    {


        $vendor = Vendor::find($id);
        $vendor->shop_name = $request->shop_name;
        $vendor->shop_url = $request->shop_url;
        $vendor->shop_email = $request->shop_email;
        $vendor->shop_phone = $request->shop_phone;
        $vendor->shop_address = $request->shop_address;
        $vendor->shop_city = $request->shop_city;
        $vendor->shop_zip = $request->shop_zip;
        $vendor->shop_description = $request->shop_description;
        $vendor->shop_facebook  = $request->shop_facebook;
        $vendor->shop_youtube   = $request->shop_youtube;
        $vendor->shop_instagram = $request->shop_instagram;


        if ($request->hasFile('shop_logo')) {
            $destination = 'uploads/images/vendor/logo' .$vendor->shop_logo;
            if (file_exists($destination)) {
                @unlink($destination);
            }
            $newsImageFile = $request->file('shop_logo');
            $imageFileName = 'logo_' . time() . '.' . $newsImageFile->getClientOriginalExtension();
            if (!file_exists('uploads/images/vendor/logo')) {
                mkdir('uploads/images/vendor/logo', 0777, true);
            }
            $newsImageFile->move('uploads/images/vendor/logo', $imageFileName);
            $vendor->shop_logo = $imageFileName;
        }

        if ($request->hasFile('shop_banner')) {
            $destination = 'uploads/images/vendor/banner' .$vendor->shop_banner;
            if (file_exists($destination)) {
                @unlink($destination);
            }
            $newsImageFile = $request->file('shop_banner');
            $imageFileName = 'banner_' . time() . '.' . $newsImageFile->getClientOriginalExtension();
            if (!file_exists('uploads/images/vendor/banner')) {
                mkdir('uploads/images/vendor/banner', 0777, true);
            }
            $newsImageFile->move('uploads/images/vendor/banner', $imageFileName);
            $vendor->shop_banner = $imageFileName;
        }

        $vendor->update();

        return redirect()->back()->with('success', 'Shop Details Updated successfully');

    }
}

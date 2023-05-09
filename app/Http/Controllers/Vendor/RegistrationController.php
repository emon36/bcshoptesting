<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use App\Models\VendorAccounts;
use App\Services\AuthService;
use App\Services\AuthSessionService;
use Illuminate\Container\RewindableGenerator;
use Illuminate\Http\Request;
use Devfaysal\BangladeshGeocode\Models\District;
use App\Http\Requests\StoreVendor;
use Illuminate\Support\Str;


class RegistrationController extends Controller
{
    public function vendorRegisterPage()
    {
        $districts = District::all();
        return view('web.pages.vendor-registration.VendorRegistration', ['districts' => $districts]);
    }

    public function vendorRegisterProcess(StoreVendor $request)
    {

        $vendorUser = new User();
        $vendorUser->name = $request->name;
        $vendorUser->email = $request->email;
        $vendorUser->phone = $request->phone;
        $vendorUser->password = bcrypt($request->password);
        $vendorUser->role_id = 2;
        $vendorUser->base_role = 'vendor';
        $vendorUser->save();
        $vendorUser->created_by = $vendorUser->id;
        $vendorUser->update();

        $vendor = new Vendor();
        $vendor->shop_name = $request->shop_name;
        $vendor->shop_url =  Str::slug($request->shop_url);
        $vendor->shop_email = $request->shop_email;
        $vendor->shop_phone = $request->shop_phone;
        $vendor->shop_address = $request->shop_address;
        $vendor->shop_city = $request->shop_city;
        $vendor->shop_zip = $request->shop_zip;
        $vendor->shop_description = $request->shop_description;
        $vendor->status = 'Pending';

        if ($request->hasFile('owner_image')) {
            $imageFile = $request->file('owner_image');
            $imageFileName = 'owner_' . time() . '.' . $imageFile->getClientOriginalExtension();
            if (!file_exists('uploads/images/vendor/owner')) {
                mkdir('uploads/images/vendor/owner', 0777, true);
            }
            $imageFile->move('uploads/images/vendor/owner', $imageFileName);
            $vendor->owner_image = $imageFileName;
        }

        if ($request->hasFile('nid')) {
            $imageFile = $request->file('nid');
            $imageFileName = 'nid_' . time() . '.' . $imageFile->getClientOriginalExtension();
            if (!file_exists('uploads/images/vendor/documents')) {
                mkdir('uploads/images/vendor/documents', 0777, true);
            }
            $imageFile->move('uploads/images/vendor/documents', $imageFileName);
            $vendor->nid = $imageFileName;
        }

        if ($request->hasFile('trade_licence')) {
            $imageFile = $request->file('trade_licence');
            $imageFileName = 'tradeLicence_' . time() . '.' . $imageFile->getClientOriginalExtension();
            if (!file_exists('uploads/images/vendor/documents')) {
                mkdir('uploads/images/vendor/documents', 0777, true);
            }
            $imageFile->move('uploads/images/vendor/documents', $imageFileName);
            $vendor->trade_licence = $imageFileName;
        }

        if ($request->hasFile('shop_logo')) {
            $imageFile = $request->file('shop_logo');
            $imageFileName = 'logo_' . time() . '.' . $imageFile->getClientOriginalExtension();
            if (!file_exists('uploads/images/vendor/logo')) {
                mkdir('uploads/images/vendor/logo', 0777, true);
            }
            $imageFile->move('uploads/images/vendor/logo', $imageFileName);
            $vendor->shop_logo = $imageFileName;
        }

        if ($request->hasFile('shop_banner')) {
            $imageFile = $request->file('shop_banner');
            $imageFileName = 'banner_' . time() . '.' . $imageFile->getClientOriginalExtension();
            if (!file_exists('uploads/images/vendor/banner')) {
                mkdir('uploads/images/vendor/banner', 0777, true);
            }
            $imageFile->move('uploads/images/vendor/banner', $imageFileName);
            $vendor->shop_banner = $imageFileName;
        }

        $vendor->shop_facebook = $request->shop_facebook;
        $vendor->shop_youtube = $request->shop_youtube;
        $vendor->shop_instagram = $request->shop_instagram;
        $vendor->owner_id = $vendorUser->id;
        $vendor->created_by = $vendorUser->id;
        $vendor->save();

        $vendorAccount = new VendorAccounts();
        $vendorAccount->vendor_id = $vendor->id;
        $vendorAccount->total_earning = 0;
        $vendorAccount->payment_due = 0;
        $vendorAccount->total_commission_given = 0;
        $vendorAccount->save();

        return redirect()->route('Vendor.RegisterComplete');


    }

    public function registrationComplete()
    {
        return view('web.pages.vendor-registration.ThankYou');
    }

}

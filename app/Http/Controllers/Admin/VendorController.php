<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVendor;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use App\Models\VendorAccounts;
use App\Models\VendorPaymentHistory;
use App\Models\WithdrawRequest;
use Devfaysal\BangladeshGeocode\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VendorController extends Controller
{

    public function pageVendorCreate()
    {
        $districts = District::all();
        return view('admin.pages.vendor.pages.CreateVendor',['districts' => $districts]);
    }

    public function pageVendorIndex()
    {

        $vendors = Vendor::with('users')->orderBy('id', 'desc')->paginate(25);
        return view('admin.pages.vendor.pages.IndexVendor' , ['vendors' => $vendors]);
    }

    public function processVendorCreate(StoreVendor $request)
    {
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
            $imageFileName = 'owner_' . time() . '.' . $imageFile->getClientOriginalExtension();
            if (!file_exists('uploads/images/vendor/documents')) {
                mkdir('uploads/images/vendor/documents', 0777, true);
            }
            $imageFile->move('uploads/images/vendor/documents', $imageFileName);
            $vendor->nid = $imageFileName;
        }

        if ($request->hasFile('trade_licence')) {
            $imageFile = $request->file('trade_licence');
            $imageFileName = 'owner_' . time() . '.' . $imageFile->getClientOriginalExtension();
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

        $vendorUser = new User();
        $vendorUser->name = $request->name;
        $vendorUser->email = $request->email;
        $vendorUser->phone = $request->phone;
        $vendorUser->password = bcrypt($request->password);
        $vendorUser->role_id = 2;
        $vendorUser->base_role = 'vendor';
        $vendorUser->save();
        $vendorUser->created_by = session()->get('user')->id;
        $vendorUser->update();

        $vendor->owner_id = $vendorUser->id;
        $vendor->created_by =  session()->get('user')->id;
        $vendor->save();

        return redirect()->back()->with('success', 'Vendor added successfully');

    }

    public function pageVendorView($id){
        $vendor = Vendor::with('users')->where('id' , $id)->first();
        return view('admin.pages.vendor.pages.ViewVendor' , ['vendor' => $vendor]);

    }

    public function pageVendorEdit($id)
    {
        $vendor = Vendor::with('users')->where('id' , $id)->first();
        return view('admin.pages.vendor.pages.EditVendor' , ['vendor' => $vendor]);
    }

    public function pageVendorUpdate(Request $request ,$id)
    {
        $vendorUser = User::where('id' , $request->owner_id)->first();
        $vendorUser->name = $request->name;
        $vendorUser->email = $request->email;
        $vendorUser->phone = $request->phone;
        $vendorUser->password = bcrypt($request->password);
        $vendorUser->update();

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

        if ($request->hasFile('owner_image')) {
            $destination = 'uploads/images/vendor/owner' .$vendor->owner_image;
            if (file_exists($destination)) {
                @unlink($destination);
            }
            $imageFile = $request->file('owner_image');
            $imageFileName = 'owner_' . time() . '.' . $imageFile->getClientOriginalExtension();
            if (!file_exists('uploads/images/vendor/owner')) {
                mkdir('uploads/images/vendor/owner', 0777, true);
            }
            $imageFile->move('uploads/images/vendor/owner', $imageFileName);
            $vendor->owner_image = $imageFileName;
        }

        if ($request->hasFile('nid')) {
            $destination = 'uploads/images/vendor/documents' .$vendor->nid;
            if (file_exists($destination)) {
                @unlink($destination);
            }
            $imageFile = $request->file('nid');
            $imageFileName = 'nid_' . time() . '.' . $imageFile->getClientOriginalExtension();
            if (!file_exists('uploads/images/vendor/documents')) {
                mkdir('uploads/images/vendor/documents', 0777, true);
            }
            $imageFile->move('uploads/images/vendor/documents', $imageFileName);
            $vendor->nid = $imageFileName;
        }

        if ($request->hasFile('trade_licence')) {
            $destination = 'uploads/images/vendor/documents' .$vendor->trade_licence;
            if (file_exists($destination)) {
                @unlink($destination);
            }
            $imageFile = $request->file('trade_licence');
            $imageFileName = 'trade_licence_' . time() . '.' . $imageFile->getClientOriginalExtension();
            if (!file_exists('uploads/images/vendor/documents')) {
                mkdir('uploads/images/vendor/documents', 0777, true);
            }
            $imageFile->move('uploads/images/vendor/documents', $imageFileName);
            $vendor->trade_licence = $imageFileName;
        }

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

        return redirect()->back()->with('success', 'Vendor Details Updated successfully');

    }

    public function statusChange(Request $request, $id)
    {
        $vendor = Vendor::find($id);
        $vendor->status = $request->status;
        $vendor->update();
        return redirect()->back()->with('success', 'Successfully Changes Status');
    }

    public function commissionChange(Request $request, $id)
    {
        $vendor = Vendor::find($id);
        $vendor->commission = $request->commission;
        $vendor->update();
        return redirect()->back()->with('success', 'Successfully Changes Commission');
    }


    public function vendorProductList($id)
    {
        $products = Product::where('vendor_id', $id)->get();

        return view('admin.pages.vendor.pages.VendorProducts', ['products' => $products]);
    }

    public function vendorList()
    {
        $vendors = Vendor::with('users', 'orders', 'orderDetails')->orderBy('id', 'desc')->paginate(15);

        return view('admin.pages.vendor.pages.VendorList' , ['vendors' => $vendors]);
    }

    public function vendorRequestList()
    {
        $vendors = Vendor::where('status', 'Pending')->paginate(25);

        return view('admin.pages.vendor.pages.VendorRequestList', ['vendors' => $vendors]);
    }

    public function vendorAccountIndex()
    {
        $vendors = Vendor::with('users', 'vendorAccount')->where('status', 'Approved')->get();
        return view('admin.pages.vendor.pages.VendorAccounts', ['vendors' => $vendors]);
    }

    public function makePayment(Request $request)
    {
        $vendorPayment = new VendorPaymentHistory();
        $vendorPayment->vendor_id = $request->vendor_id;
        $vendorPayment->vendor_account_id = $request->vendor_account_id;
        $vendorPayment->paying_amount = $request->paying_amount*100;
        $vendorPayment->save();

        $vendorAccount = VendorAccounts::where('id', $vendorPayment->vendor_account_id)->first();
        $vendorAccount->payment_due = $vendorAccount->payment_due -   $vendorPayment->paying_amount;
        $vendorAccount->update();

        return redirect()->back()->with('success', 'Payment Submitted successfully');

    }

    public function paymentHistoryList()
    {
        $paymentHistories = VendorPaymentHistory::with('vendor')->get();

        return view('admin.pages.vendor.pages.VendorPaymentHistoryList', ['paymentHistories' => $paymentHistories]);
    }

    public function withdrawList()
    {
        $withdrawList = WithdrawRequest::with('vendor')->get();

        return view('admin.pages.vendor.pages.VendorWithdrawRequestList', ['withdrawList' => $withdrawList]);

    }

    public function withdrawStatusChange(Request $request)
    {
        $withdrawRequest = WithdrawRequest::find($request->id);
        $withdrawRequest->status = $request->status;
        $withdrawRequest->approved_by = session()->get('user')->id;
        $withdrawRequest->update();

        if ($withdrawRequest->status == 'Approved')
        {
            $vendorPayment = new VendorPaymentHistory();
            $vendorPayment->vendor_id = $withdrawRequest->vendor_id;
            $vendorPayment->vendor_account_id = $withdrawRequest->vendor_account_id;
            $vendorPayment->paying_amount = $withdrawRequest->amount;
            $vendorPayment->save();

            $vendorAccount = VendorAccounts::where('id', $vendorPayment->vendor_account_id)->first();
            $vendorAccount->payment_due = $vendorAccount->payment_due -  $vendorPayment->paying_amount;
            $vendorAccount->update();

        }

        return response()->json(['success' => 'Status Changed Successfully']);

    }
}

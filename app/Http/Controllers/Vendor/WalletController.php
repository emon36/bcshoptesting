<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function withdrawRequest(Request $request)
    {

        $vendor = Vendor::where('owner_id', session()->get('user')->id)->first();

        $withdrawRequest = new WithdrawRequest();
        $withdrawRequest->vendor_id = $vendor->id ;
        $withdrawRequest->vendor_account_id = $request->vendor_account_id ;
        $withdrawRequest->withdraw_method = $request->withdraw_method;
        $withdrawRequest->account_number = $request->account_number;
        $withdrawRequest->amount = $request->amount*100;
        $withdrawRequest->save();

        return redirect()->back();
    }
}

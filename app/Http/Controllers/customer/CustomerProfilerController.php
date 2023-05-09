<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\SupportTicket;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CustomerAddress;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CustomerProfilerController extends Controller
{
    public function updateProfile(Request $request)
    {

        $customer = User::where('id', session()->get('user')->id)->first();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->update();

        return redirect()->back()->with('success', 'Your Profile Updated Successfully');
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'confirm_password' => ['same:new_password'],
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with('error','Your Password can not reset submit correctly');
        }
        User::find(session()->get('user')->id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect()->back()->with('success','Your Password has been reset');

    }
    public function createAddress(Request $request)
    {
        $address = new CustomerAddress();
        $address->customer_id = session()->get('user')->id;
        $address->name = $request->name;
        $address->email = $request->email;
        $address->phone = $request->phone;
        $address->division = $request->division;
        $address->district = $request->district;
        $address->city = $request->city;
        $address->zip = $request->zip;
        $address->address = $request->address;
        $address->save();

        return redirect()->back()->with('success', 'shipping address added successfully');

    }
    public function updateAddress(Request $request, $id)
    {
        $address = CustomerAddress::find($id);
        $address->customer_id = session()->get('user')->id;
        $address->name = $request->name;
        $address->email = $request->email;
        $address->phone = $request->phone;
        $address->division = $request->division;
        $address->district = $request->district;
        $address->city = $request->city;
        $address->zip = $request->zip;
        $address->address = $request->address;
        $address->update();

        return redirect()->back()->with('success', 'shipping address updated successfully');

    }

    public function singleTicket($id)
    {
        $ticket = SupportTicket::where('id', $id)->first();
        return view('web.pages.customer_ticket_view', compact('ticket'));
    }


    public function submitTicket(Request $request)
    {
        $ticket = new SupportTicket();
        $ticket->customer_id = session()->get('user')->id;
        $ticket->subject = $request->subject;
        $ticket->type = $request->type;
        $ticket->priority = $request->priority;
        $ticket->description = $request->description;
        $ticket->save();

        return redirect()->back()->with('success', 'your ticket submitted successfully');

    }

    public function  commentSubmit(Request $request, $id){

        DB::table('support_tickets')->where(['id' => $id])->update([
            'status' => 'open',
            'updated_at' => now(),
        ]);

        DB::table('support_ticket_convos')->insert([
            'customer_message' => $request->comment,
            'support_ticket_id' => $id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return back();
    }

}

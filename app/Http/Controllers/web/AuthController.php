<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRegistration;
use App\Models\Cart;
use App\Models\GuestCart;
use App\Models\User;
use App\Services\AuthService;
use App\Services\AuthSessionService;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function pageCustomerLogin()
    {

        return view('web.pages.customer-login.CustomerLogin');
    }

    public function customerLoginProcess(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $authService = new AuthService();
        $authService->setEmail($request->email);
        $authService->setPassword($request->password);
        $user = $authService->panelLogin();

        if($user){
            $newAuthSession = new AuthSessionService();
            $newAuthSession->generateToken();
            $newAuthSession->setIpAddress($request->ip());
            $newAuthSession->setUserAgent($request->userAgent());
            $newAuthSession->setStatus('active');
            $newAuthSession->setCreatedBy($user->id);
            $newAuthSession->create();


            session()->put('user', $user);
            session()->put('authSession', $newAuthSession);

            if (Cookie::get('__cart') !== null)
            {
                $guestCartExist = GuestCart::where('guest_user_id' , Cookie::get('__cart'))->get();

                if ($guestCartExist)
                {
                    foreach ($guestCartExist as $row)
                    {
                        $cart = new Cart();
                        $cart->product_id = $row->product_id;
                        $cart->vendor_id = $row->vendor_id;
                        $cart->customer_id = session()->get('user')->id;
                        $cart->quantity =  $row->quantity;
                        $cart->save();
                    }
                    GuestCart::where('guest_user_id' , Cookie::get('__cart'))->delete();
                }
            }

            if($request->has('rdrto')){
                return redirect()->to($request->rdrto);
            }

            return redirect()->route('Home')->with('success', 'You have been login Successfully' );
        }



        return redirect()->back()->with('error', 'Email or password is incorrect');

    }

    public function logout()
    {
        $authSessionService = new AuthSessionService();
        $authSessionService->setToken(session()->get('authSession')->getToken());
        $authSessionService->setCreatedBy(session()->get('user')->id);

        if($authSessionService->verifyToken()){
            $authSessionService->setStatus('inactive');
            $authSessionService->setEndedAt(time());
            $authSessionService->kill();
        }

        session()->forget('user');
        session()->forget('authSession');



        return redirect()->route('Home')->with('success','You have been logout Successfully');
    }

    public function pageCustomerRegistration()
    {
        return view('web.pages.customer-registration.CustomerRegistration');
    }

    public function customerRegisterProcess(CustomerRegistration $request)
    {

        $customer = new User();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->password = bcrypt($request->password);
        $customer->role_id = 3;
        $customer->base_role = 'customer';
        $customer->save();
        $customer->created_by = $customer->id;
        $customer->update();

        $authService = new AuthService();
        $authService->setEmail($request->email);
        $authService->setPassword($request->password);
        $user = $authService->panelLogin();

        if ($user) {
            $newAuthSession = new AuthSessionService();
            $newAuthSession->generateToken();
            $newAuthSession->setIpAddress($request->ip());
            $newAuthSession->setUserAgent($request->userAgent());
            $newAuthSession->setStatus('active');
            $newAuthSession->setCreatedBy($user->id);
            $newAuthSession->create();


            session()->put('user', $user);
            session()->put('authSession', $newAuthSession);
            if (Cookie::get('__cart') !== null)
            {
                $guestCartExist = GuestCart::where('guest_user_id' , Cookie::get('__cart'))->get();

                if ($guestCartExist)
                {
                    foreach ($guestCartExist as $row)
                    {
                        $cart = new Cart();
                        $cart->product_id = $row->product_id;
                        $cart->vendor_id = $row->vendor_id;
                        $cart->customer_id = session()->get('user')->id;
                        $cart->quantity =  $row->quantity;
                        $cart->unit_price =  $row->unit_price;
                        $cart->save();
                    }
                    GuestCart::where('guest_user_id' , Cookie::get('__cart'))->delete();
                }
            }

            if($request->has('rdrto')){
                return redirect()->to($request->rdrto);
            }

            return redirect()->route('Home')->with('success', 'Your Registration Completed Successfully');

        }
    }


}

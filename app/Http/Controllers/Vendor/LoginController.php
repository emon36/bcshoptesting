<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use App\Services\AuthSessionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    //

    public function vendorLoginPage()
    {
        return view('web.pages.vendor-login.VendorLogin');
    }

    public function vendorLoginProcess(Request $request)
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

            return redirect()->route('InVendor.Dashboard');
        }


        return redirect()->back()->with('error', 'Email or password is incorrect');

    }

    public function logout()
    {
        // verify auth session
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

        return redirect()->route('Vendor.LoginPage');
    }


}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Services\AuthSessionService;

class AuthController extends Controller
{
    public function pageAdminLogin()
    {
        return view('admin.pages.login.Login');
    }

    public function processAdminLogin(Request $request)
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

            return redirect()->route('InAdmin.Dashboard');
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

        return redirect()->route('InAdmin.LoginPage');
    }


}

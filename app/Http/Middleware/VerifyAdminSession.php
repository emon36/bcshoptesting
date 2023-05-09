<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyAdminSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $permission = 'How to get this?';
        $authSessionService = new \App\Services\AuthSessionService();
        $authSessionService->setToken(session()->get('authSession')->getToken());
        $authSessionService->setCreatedBy(session()->get('user')->id);

        if(!$authSessionService->verifyToken()){
            return redirect()->route('InAdmin.LoginPage');
        }
        if(session()->get('user')->base_role != 'admin'){
            return redirect()->route('InAdmin.LoginPage');
        }
        if(!\App\Services\PermissionService::verify($permission)){
            return redirect()->route('InAdmin.LoginPage');
        }


        
        return $next($request);
    }
}

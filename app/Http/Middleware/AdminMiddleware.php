<?php

namespace App\Http\Middleware;

use App\Services\AuthSessionService;
use Closure;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;


class AdminMiddleware
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
        $agent = new Agent();

        $result = $agent->isMobile();
        if ($result)
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

            return redirect()->route('Mobile.Error');

        }else{
            if (session()->get('user') != Null and session()->get('user')->base_role == 'admin')
            {
                return $next($request);
            }
            else{
                return redirect()->route('InAdmin.LoginPage')->with('error','You have not admin access');
            }
        }


    }
}

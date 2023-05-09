<?php

namespace App\Http\Middleware;

use App\Models\Vendor;
use Closure;
use Illuminate\Http\Request;

class ActiveVendorMiddlware
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
        $vendor = Vendor::where('owner_id', session()->get('user')->id)->where('status', 'Approved')->first();
        if ($vendor != NUll)
        {
            return $next($request);
        }
        else{
            return redirect()->route('InVendor.Dashboard');
        }
    }
}

<?php

namespace App\Http\Middleware;

use App\Models\event;
use Closure;
use Illuminate\Http\Request;

class LocationMiddleware
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
        $datas = event::select('event_address')->distinct()->get();
        $request->merge(["datas" => $datas]);
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $type)
    {
        if(auth()->user()->type == $type){
            return $next($request);
        }
        $aduh = auth()->user()->type;
          
        return response()->json(['You do not have permission to access for this page '.$aduh]);
        /* return response()->view('errors.check-permission'); */
    }
}

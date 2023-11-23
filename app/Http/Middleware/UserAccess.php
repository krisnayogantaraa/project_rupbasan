<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!auth()->check()) {
            // Pengguna belum login, arahkan ke halaman login
            return redirect()->route('login');
        }
    
        $allowedRoles = collect($roles);
    
        if (!$allowedRoles->contains(auth()->user()->type)) {
            // Pengguna mencoba mengakses rute yang tidak sesuai, arahkan ke rute sesuai perannya
            switch (auth()->user()->type) {
                case 'admin':
                    return redirect()->route('posts.index');
                case 'operator':
                    return redirect()->route('posts.index');
                case 'gudang':
                    return redirect()->route('warehouse.index');
                default:
                    return redirect()->route('home');
            }
        }
    
        return $next($request);
    }
}

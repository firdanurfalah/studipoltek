<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // cek level user bila sesuai maka dapat akses bila tidak akan dikembalikan ke halaman sebelumnya
        if (auth()->user()->level == 'admin' || auth()->user()->level == 'owner') {
            return $next($request);
        }
        return Redirect::back()->with('info', 'akses dibatasi');
    }
}

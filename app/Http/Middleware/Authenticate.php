<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }

    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            if (auth()->user()->level == 'user') {
                if (!auth()->user()->email_verified_at) {
                    return redirect()->to('/')->with('info', 'email belum di verifikasi');
                }
            }
            return $next($request);
        }
        return redirect()->to('/')->with('info', 'silahkan login terlebih dahulu');
    }
}

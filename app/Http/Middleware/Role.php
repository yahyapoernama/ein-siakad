<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next, $role): Response
    {
        if (strcasecmp($request->user()->role, $role) == 0) {
            return $next($request);
        }

        abort(403, 'Anda tidak memiliki hak akses untuk mengakses laman tersebut!');
    }
}

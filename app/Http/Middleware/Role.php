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
     * @param  array  ...$roles  Array of role names to check against
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Memastikan user terautentikasi
        if (!$request->user()) {
            abort(403, 'Unauthorized');
        }

        // Mendapatkan role name dari user
        $userRoleName = $request->user()->role ? $request->user()->role->name : null;

        // Cek apakah role name user termasuk dalam array role yang diberikan
        if (in_array($userRoleName, $roles)) {
            return $next($request);
        }

        abort(403, 'Anda tidak memiliki hak akses untuk mengakses laman tersebut!');
    }
}

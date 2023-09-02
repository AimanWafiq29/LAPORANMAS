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
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $userRole): Response
    {
        // Pastikan pengguna telah masuk (authenticated)
        if (!auth()->check()) {
            // Pengguna belum masuk, Anda dapat mengarahkannya ke halaman masuk atau tindakan lain.
            // Misalnya, mengembalikan kode status HTTP 401 (Unauthorized).
            return abort(401, 'Unauthorized');
        }

        // Periksa peran pengguna
        $userRole = auth()->user()->role;
        if ($userRole == 'admin' || $userRole == 'staff' || $userRole == 'warga') {
            return $next($request);
        }

        // Jika pengguna tidak memiliki izin, arahkan ke halaman kesalahan izin.
        return abort(403, 'Forbidden');
    }
}

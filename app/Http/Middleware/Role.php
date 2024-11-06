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
    public function handle(Request $request, Closure $next): Response
    {
        $role = $request->route()->parameter("role");
        if (empty($role)) {
            $role = "User";
        }elseif (in_array($role, ["User","Karyawan"])) {
            $role = "Karyawan";
        }
        return $next($request);
    }
}

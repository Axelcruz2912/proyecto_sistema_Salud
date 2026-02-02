<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolMiddleware
{
    public function handle(Request $request, Closure $next, $rol)
    {
        //dd(auth()->user()->rol->nombre_rol);

        $user = Auth::user();

        if (!$user || strtolower($user->rol->nombre_rol) !== strtolower($rol)) {
            abort(403, 'No autorizado');
        }

        return $next($request);
    }
}


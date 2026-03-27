<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiAuth
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('Authorization');

        if (!$token) {
            return response()->json([
                'error' => 'Token no proporcionado'
            ], 401);
        }

        if ($token != 'Bearer MI_TOKEN_SECRETO') {
            return response()->json([
                'error' => 'Token inválido'
            ], 401);
        }

        return $next($request);
    }
}
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class CheckLogin
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json([
                'status'  => false,
                'message' => 'Unauthorized. Token not provided.',
            ], 401);
        }

        $accessToken = PersonalAccessToken::findToken($token);

        if (!$accessToken || ($accessToken->expires_at && $accessToken->expires_at->isPast())) {
            return response()->json([
                'status'  => false,
                'message' => 'Unauthorized. Token invalid or expired.',
            ], 401);
        }

        // Gán user vào request
        $request->setUserResolver(fn() => $accessToken->tokenable);

        return $next($request);
    }
}
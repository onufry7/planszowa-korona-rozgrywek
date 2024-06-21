<?php

namespace App\Http\Middleware;

use App\Models\AccessToken as AccessTokenModel;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccessToken
{
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->query('token') ?? $request->input('access-token');
        $useRegisterToken = env('REGISTER_TOKEN', true);

        if ($useRegisterToken && is_null($request->input('access-token'))) {
            return abort(404);
        } elseif ($useRegisterToken && ! $this->isValidToken($token)) {
            return abort(403, __('Invalid or expired token!'));
        }

        return $next($request);
    }

    private function isValidToken(mixed $token): bool
    {
        $accessToken = AccessTokenModel::where('token', $token)->first();

        return $accessToken && url()->current() == $accessToken->url && ! $accessToken->isExpired() && ! $accessToken->is_used;
    }
}

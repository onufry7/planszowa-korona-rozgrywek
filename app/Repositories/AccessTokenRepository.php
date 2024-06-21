<?php

namespace App\Repositories;

use App\Http\Requests\AccessTokenRequest;
use App\Models\AccessToken;
use App\Services\AccessTokenService;

class AccessTokenRepository
{
    private AccessTokenService $service;

    public function __construct(AccessTokenService $accessTokenService)
    {
        $this->service = $accessTokenService;
    }

    public function store(AccessTokenRequest $request): AccessToken|false
    {
        $accessToken = new AccessToken($request->validated());
        $accessToken->token = AccessToken::generateToken();

        if ($accessToken->save()) {
            $this->service->sendMail($request->input('email'), $accessToken);

            return $accessToken;
        }

        return false;
    }
}

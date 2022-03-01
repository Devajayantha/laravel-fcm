<?php

namespace App\Http\Controllers\Api\V1\Membership;

use App\Http\Requests\Api\V1\Membership\LoginRequest;


class LoginController
{
    public function login(LoginRequest $request)
    {
        $user = $request->authenticate();

        return response()->json([
            'data' => [
                'access_token' => $user->createToken($user->id)->plainTextToken,
                'user'         => $user,
            ]
        ]);

    }
}

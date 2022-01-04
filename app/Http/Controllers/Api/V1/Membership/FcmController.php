<?php

namespace App\Http\Controllers\Api\V1\Membership;

use Illuminate\Http\Request;
use App\Models\FcmToken;

class FcmController
{
    public function store(Request $request)
    {
        $request->validate([
            'token' => 'required'
        ]);

        $token = FcmToken::firstOrNew([
            'token_id'=> $request->user()->currentAccessToken()->token,
        ]);

        $token->fcm_token = $request->token;

        $request->user()->fcmToken()->save($token);

        return response()->json([
            'data' => new \stdClass()
        ]);
    }
}

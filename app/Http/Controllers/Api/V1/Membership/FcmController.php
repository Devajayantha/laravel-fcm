<?php

namespace App\Http\Controllers\Api\V1\Membership;

use Illuminate\Http\Request;
use App\Models\FcmToken;
use App\Notifications\FcmStarter;
use Illuminate\Support\Facades\Auth;

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

    public function send()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $user->notify(new FcmStarter());
    }
}

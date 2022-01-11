<?php

namespace App\Http\Controllers\Api\V1\Membership;

use Illuminate\Http\Request;
use App\Models\FcmToken;
use App\Notifications\FcmStarter;
use App\Service\Fcm;
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

    public function send() {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $input = [
            'title' => 'judul nya ini',
            'body' => 'body nya ini',
            'data_type' => 'registered'
        ];

        Fcm::create($user,$input);
    }
}

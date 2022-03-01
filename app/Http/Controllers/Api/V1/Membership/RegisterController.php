<?php

namespace App\Http\Controllers\Api\V1\Membership;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Timedoor\TmdMembership\requests\Api\LoginRequest;

class RegisterController
{
    public function store(Request $request)
    {
        // register
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'data' => new \stdClass()
        ]);

    }
}

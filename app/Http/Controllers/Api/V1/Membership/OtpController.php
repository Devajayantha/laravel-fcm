<?php

namespace App\Http\Controllers\Api\V1\Membership;

use App\Events\OtpEvent;
use App\Models\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Membership\OtpRequest;

class OtpController extends Controller
{
    public function store(OtpRequest $request)
    {
        DB::beginTransaction();
        try {
            $otp = (new Otp)->getInstance($request);

            $otp->phone_code = $request->phone_code;
            $otp->phone      = $request->phone;
            $otp->email      = $request->email;

            $otp->save();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();

            return $e->getMessage();
        }

        event(new OtpEvent($otp));

        return response()->json([
            'data' => new \stdClass()
        ]);
    }

    public function check(Request $request)
    {
        $otp = new Otp();

        $request->validate([
            'email' => 'nullable|email',
            'token' => 'numeric|digits:' . $otp::DIGIT_OTP
        ]);

        try {
           $otp->checkOtp($request);
        } catch (\Exception $e) {
            throw $e;
        }

        return response()->json([
            'data' => new \stdClass()
        ]);
    }
}

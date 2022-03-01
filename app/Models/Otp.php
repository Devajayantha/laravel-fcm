<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Timedoor\TmdMembership\Exceptions\OtpExpiredException;
use Timedoor\TmdMembership\Exceptions\OtpNotFound;

class Otp extends Model
{
    use HasFactory;

    const EXPIRED_OTP = 5; //in minute
    const DIGIT_OTP   = 6;
    const MAX_SEND    = 3;

    protected $fillable = [
        'token',
        'email',
        'phone',
        'count_sending',
        'verified_at',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model) {
            $model->token      = $model->rand(self::DIGIT_OTP);
            $model->expired_at = now()->addMinutes(self::EXPIRED_OTP)->format('Y-m-d H:i:s');
        });

        self::saving(function($model) {
            $model->count_sending = $model->count_sending + 1;
        });
    }

    public function scopeGetLatestOtp($query, $request)
    {
        if ($email = $request->email) {
            $query->where('email', $email);
        }

        if ($phone = $request->phone && $phoneCode = $request->phone_code) {
            $query->OrWhere(function($sub)  use ($phone, $phoneCode) {
                $sub->where('phone', $phone)
                    ->where('phone_code', $phoneCode);
            });
        }

        $query->withoutVerified()
                ->latest();
    }

    public function getInstance(Request $request)
    {
        return $this->query()
                    ->getLatestOtp($request)
                    ->withoutExpired()
                    ->first() ?? $this;
    }

    public function checkOtp($request)
    {
        $otp = $this->query()
                    ->getLatestOtp($request)
                    ->whereToken($request->token)
                    ->first();

        throw_if(!$otp, new OtpNotFound());
        throw_if($otp->isExpired(), new OtpExpiredException());

        $otp->verify();
    }

    public function scopeWithoutVerified($query)
    {
        return $query->whereNull('verified_at');
    }

    public function scopeWithoutExpired($query)
    {
        $query->where('expired_at', '>', now()->format('Y-m-d H:i:s'));
    }

    public function isVerified()
    {
        return ! is_null($this->verified_at);
    }

    public function isExpired()
    {
        return ($this->expired_at <= Carbon::now());
    }

    public function isReachedMax()
    {
        return ($this->count_sending >= self::MAX_SEND);
    }

    public function verify()
    {
        $query = $this->newModelQuery()->where($this->getKeyName(), $this->getKey());

        $time = $this->freshTimestamp();

        $columns = ['verified_at' => $this->fromDateTime($time)];

        $this->verified_at = $time;

        if ($this->timestamps && ! is_null($this->getUpdatedAtColumn())) {
            $this->{$this->getUpdatedAtColumn()} = $time;

            $columns[$this->getUpdatedAtColumn()] = $this->fromDateTime($time);
        }

        if ($query->update($columns)) {
            $this->syncOriginal();
        }
    }

    private function rand($digit = 5)
    {
        return rand(pow(10, $digit-1), pow(10, $digit) -1);
    }
}
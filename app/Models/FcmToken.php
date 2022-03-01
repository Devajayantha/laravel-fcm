<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FcmToken extends Model
{
    protected $fillable = [
        'token_id',
        'fcm_token'
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $platform = preg_match('/iOS/i', request()->server('HTTP_USER_AGENT')) ? 'iOS' : 'Android';

            $model->platform = $platform;
        });
    }

    public function getTokenAttribute()
    {
        return $this->fcm_token;
    }


    public function fcmable()
    {
        return $this->morphTo();
    }
}

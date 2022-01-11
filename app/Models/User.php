<?php

namespace App\Models;

use App\Infrastructure\Contracts\HasRoutesNotifications;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Timedoor\TmdMembership\traits\Fcmable;

class User extends Authenticatable implements HasRoutesNotifications
{
    use HasApiTokens, HasFactory, Notifiable, Fcmable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Specifies the user's FCM token
     *
     * @return string
     */
    public function routeNotificationForFcm()
    {
        return $this->currentAccessToken();
    }

    public function getNotificationIdentifier()
    {
        return $this->getKey();
    }
}

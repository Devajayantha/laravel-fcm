<?php

namespace App\Models\Concerns\Notification;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @see \App\Models\Notification
 */
trait Relations
{
    /**
     * Get the user that owns the notification.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    /**
     * Return \App\Models\Product model relation value.
     *
     * @return \App\Models\User
     */
    public function getUserRelationValue(): User
    {
        return $this->getRelationValue('user');
    }

    public function setUserRelationValue(User $user)
    {
        $this->user()->associate($user);

        return $this;
    }
}

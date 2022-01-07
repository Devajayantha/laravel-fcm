<?php

namespace App\Infrastructure\Notifications;

use App\Channels\Messages\TextMessage;
use App\Models\Notification;

interface CanSendFcmDatabase
{
    /**
     * get the database representation of the notification.
     *
     * @param  \App\Models\Notification $notifiable
     * @return \App\Channels\Messages\TextMessage
     */
    public function toDatabase(Notification $notifiable): TextMessage;
}
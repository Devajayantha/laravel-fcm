<?php

namespace App\Service;

use App\Infrastructure\Contracts\HasRoutesNotifications;
use App\Notifications\FcmStarter;
use Illuminate\Support\Facades\Log;

class Fcm
{
    /**
     * Create a broadcast to send FCM Notification.
     *
     * @param  \App\Infrastructure\Contracts\HasRoutesNotifications  $model
     * @param  array $content
     *
     * @return void
     */
    public static function create(HasRoutesNotifications $model, array $content)
    {
        fcm::createLog($content);

        $model->notify(new FcmStarter($content));
    }

    /**
     * Create a log info after send FCM notification.
     *
     * @param  array $content
     *
     * @return void
     */
    protected static function createLog(array $content) {
        Log::info(sprintf('%s notification class was sent a FCM message', static::class), $content);
    }
}

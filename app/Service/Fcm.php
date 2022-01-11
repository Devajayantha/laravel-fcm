<?php

namespace App\Service;

use App\Infrastructure\Contracts\HasRoutesNotifications;
use App\Notifications\FcmStarter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Fcm
{
    /**
     * Create a broadcast to send FCM Notification.
     *
     * @param \App\Infrastructure\Contracts\HasRoutesNotifications $model
     * @param string $title
     * @param string $body
     * @param string|null $type
     * @param \Illuminate\Database\Eloquent\Model|null $receive
     *
     * @return void
     */
    public static function create(
        HasRoutesNotifications $model,
        string $title,
        string $body,
        $type = null,
        $receive = null
    ){
        fcm::createLog($model, $title, $body, $type, $receive);

        $model->notify(
            new FcmStarter($model, $body, $title, $type, $receive)
        );
    }

    /**
     * Create a log info after send FCM notification.
     *
     * @param \App\Infrastructure\Contracts\HasRoutesNotifications $model
     * @param string $title
     * @param string $body
     * @param string|null $type
     * @param \Illuminate\Database\Eloquent\Model|null $received
     *
     * @return void
     */
    protected static function createLog(
        HasRoutesNotifications $model,
        string $title,
        string $body,
        $type = null,
        Model $received = null
    ) {
        Log::info(sprintf('%s notification class was sent a FCM message', static::class), [
            'title' => $title,
            'body' => $body,
            'notification_type' => $body,
            'sender_id' => $model->getNotificationIdentifier(),
            'received_id' => optional($received)->getKey(),
        ]);
    }
}

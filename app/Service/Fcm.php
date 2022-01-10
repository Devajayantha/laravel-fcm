<?php

namespace App\Service;

use App\Notifications\FcmStarter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Fcm
{
    /**
     * Undocumented function
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param String $title
     * @param String $body
     * @param String|null $type
     * @param \Illuminate\Database\Eloquent\Model|null $receive
     * @return void
     */
    public static function create(
        Model $model,
        String $title,
        String $body,
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
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param String $title
     * @param String $body
     * @param String|null $type
     * @param \Illuminate\Database\Eloquent\Model|null $receive
     *
     * @return void
     */
    protected static function createLog(
        Model $model,
        String $title,
        String $body,
        $type = null,
        $receive = null
    ) {
        Log::info(sprintf('%s notification class was sent a FCM message', static::class), [
            'title' => $title,
            'body' => $body,
            'notification_type' => $body,
            'sender_id' => $model->getKey(),
            'receive_id' => optional($receive)->getKey(),
        ]);
    }
}

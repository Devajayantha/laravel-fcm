<?php

namespace App\Channels;

use App\Infrastructure\Notifications\CanSendFcmDatabase;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;

class DatabaseChannel
{
    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param \App\Infrastructure\Notifications\CanSendFcmDatabase $notification
     * @return void
     */
    public function send($notifiable, CanSendFcmDatabase $notification)
    {
        $notification = $notification->toDatabase($notifiable);

        $notification->save();

        // if (empty($message)) {
        //     return;
        // }

        // DB::beginTransaction();
        // try {
        //     /** @var \App\Models\Notification $notification */
        //     $notification = Notification::create([
        //         'body' => $message->content['body'],
        //         'title' => $message->content['title'],
        //         'type' => $message->content['type'],
        //     ]);

        //     DB::commit();
        // } catch (\Throwable $th) {
        //     throw $th;

        //     DB::rollBack();
        // }
    }
}

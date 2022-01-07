<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\Fcm\FcmChannel;
use NotificationChannels\Fcm\FcmMessage;

class FcmStarter extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [FcmChannel::class];
    }

    public function toFcm($notifiable)
    {
        return FcmMessage::create()
            ->setData([
                'body' => "Member baru atas nama [Pelanggan Pertama] dari lembaga [Citra Sementara] baru saja bergabung di sistem.",
                'customer_id' => "1",
                'title' => "Member Terdaftar",
                'type'  => "registered"
            ]);
    }

}

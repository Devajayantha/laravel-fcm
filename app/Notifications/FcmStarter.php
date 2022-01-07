<?php

namespace App\Notifications;

use App\Channels\DatabaseChannel;
use App\Channels\Messages\TextMessage;
use App\Infrastructure\Notifications\CanSendFcmDatabase;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\Fcm\FcmChannel;
use NotificationChannels\Fcm\FcmMessage;

class FcmStarter extends Notification implements ShouldQueue, CanSendFcmDatabase
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
        return [FcmChannel::class, DatabaseChannel::class];
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

    /**
     * {@inheritDoc}
     */
    public function toDatabase($notifiable): TextMessage
    {
        return new TextMessage([
            'body' => "Member baru atas nama [Pelanggan Pertama] dari lembaga [Citra Sementara] baru saja bergabung di sistem.",
            'customer_id' => "1",
            'title' => "Member Terdaftar",
            'type'  => "registered"
        ]);
    }

}

<?php

namespace App\Notifications;

use App\Service\Channel\DatabaseChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\Fcm\FcmChannel;
use NotificationChannels\Fcm\FcmMessage;

/**
 * @see \App\Service\Fcm
 */
class FcmStarter extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Get data value notifications.
     *
     * @var array
     */
    protected $content = [];

    /**
     * Create a new notification instance.
     *
     * @param array $content
     */
    public function __construct(array $content) {
        $this->content = $content;
    }

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

    /**
     * Get the fcm representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \NotificationChannels\Fcm\FcmMessage
     */
    public function toFcm($notifiable)
    {
        return FcmMessage::create()
            ->setData($this->content);
    }

    /**
     * Get the database representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return $this->content;
    }
}

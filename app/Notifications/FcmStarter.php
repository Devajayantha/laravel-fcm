<?php

namespace App\Notifications;

use App\Channels\DatabaseChannel;
use App\Infrastructure\Contracts\HasRoutesNotifications;
use App\Infrastructure\Notifications\CanSendFcmDatabase;
use App\Models\Notification as ModelsNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notification;
use NotificationChannels\Fcm\FcmChannel;
use NotificationChannels\Fcm\FcmMessage;

/**
 * @see \App\Service\Fcm
 */
class FcmStarter extends Notification implements ShouldQueue, CanSendFcmDatabase
{
    use Queueable;

    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $body;

    /**
     * @var string|null
     */
    protected $type;

    /**
     * @var \Illuminate\Database\Eloquent\Model|null
     */
    protected $received;

    /**
     * Create a new notification instance.
     *
     * @param \App\Infrastructure\Contracts\HasRoutesNotifications $model
     * @param string $body
     * @param string $title
     * @param string|null $type
     * @param \Illuminate\Database\Eloquent\Model|null $received
     */
    public function __construct(
        HasRoutesNotifications $model,
        string $body,
        string $title,
        string $type = null,
        Model $received = null
    ) {
        $this->model = $model;
        $this->body = $body;
        $this->title = $title;
        $this->type = $type;
        $this->received = $received;
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
     * @param mixed $notifiable
     * @return \\NotificationChannels\Fcm\FcmMessage
     */
    public function toFcm($notifiable)
    {
        return FcmMessage::create()
            ->setData([
                'body' => $this->body,
                'title' => $this->title,
                'received_id' => optional($this->received)->getKey(),
                'type'  => $this->type
            ]);
    }

    /**
     * {@inheritDoc}
     */
    public function toDatabase($notifiable): ModelsNotification
    {
        $model = new ModelsNotification([
            'body' => $this->body,
            'title' => $this->title,
            'type'  => $this->type
        ]);

        $model->setUserRelationValue($this->model);

        return $model;
    }
}

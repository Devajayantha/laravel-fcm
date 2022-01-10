<?php

namespace App\Notifications;

use App\Channels\DatabaseChannel;
use App\Channels\Messages\TextMessage;
use App\Infrastructure\Notifications\CanSendFcmDatabase;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notification;
use NotificationChannels\Fcm\FcmChannel;
use NotificationChannels\Fcm\FcmMessage;

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
     * Undocumented function
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param String $body
     * @param String $title
     * @param String|null $type
     * @param \Illuminate\Database\Eloquent\Model|null $receive
     */
    public function __construct(
        Model $model,
        String $body,
        String $title,
        String $type = null,
        Model $receive = null
    ) {
        $this->model = $model;
        $this->body = $body;
        $this->title = $title;
        $this->type = $type;
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

    public function toFcm($notifiable)
    {
        return FcmMessage::create()
            ->setData([
                'body' => $this->body,
                'title' => $this->title,
                'customer_id' => "1",
                'type'  => $this->type
            ]);
    }

    /**
     * {@inheritDoc}
     */
    public function toDatabase($notifiable): TextMessage
    {
        return new TextMessage([
            'body' => $this->body,
            'title' => $this->title,
            'customer_id' => "1",
            'type'  => $this->type
        ]);
    }
}

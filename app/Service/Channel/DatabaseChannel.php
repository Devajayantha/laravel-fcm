<?php

namespace App\Service\Channel;

use Illuminate\Notifications\Channels\DatabaseChannel as ChannelsDatabaseChannel;
use Illuminate\Notifications\Notification;
use RuntimeException;

class DatabaseChannel extends ChannelsDatabaseChannel
{
    /**
     * Variable for data type.
     *
     * @var string
     */
    const DATA_TYPE = 'data_type';

    /**
     * Set value default for data type.
     *
     * @var string
     */
    const DATA_TYPE_DEFAULT = 'null';

    /**
     * {@inheritDoc}
     */
    protected function buildPayload($notifiable, Notification $notification)
    {
        return [
            'id' => $notification->id,
            'type' => method_exists($notification, 'databaseType')
                        ? $notification->databaseType($notifiable)
                        : get_class($notification),
            'data_type' => $this->getDataType($notifiable, $notification),
            'data' => $this->getData($notifiable, $notification),
            'read_at' => null,
        ];
    }

    /**
     * Get the data type for the notification.
     *
     * @param mixed  $notifiable
     * @param \Illuminate\Notifications\Notification  $notification
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected function getDataType($notifiable, Notification $notification)
    {
        if (method_exists($notification, 'toDatabase')) {
            $data = $notification->toDatabase($notifiable);

            return array_key_exists(static::DATA_TYPE, $data)
                ? $data[static::DATA_TYPE]
                : static::DATA_TYPE_DEFAULT;
        }

        throw new RuntimeException('Notification is missing toDatabase / toArray method.');
    }
}

<?php

namespace App\Channels\Messages;

class TextMessage
{
    /**
     * Message content that will be sent.
     *
     * @var array
     */
    public $content;

    /**
     * Create a new instance class.
     *
     * @param  array  $content
     * @return void
     */
    public function __construct(array $content)
    {
        $this->content = $content;
    }
}

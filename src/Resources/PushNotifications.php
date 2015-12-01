<?php

namespace Devio\Pipedrive\Resources;

class PushNotifications extends AbstractResource
{
    /**
     * Disabled abstract methods.
     *
     * @var array
     */
    protected $disabled = ['deleteBulk'];
}
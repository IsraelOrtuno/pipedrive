<?php

namespace Devio\Pipedrive\Resources;

use Devio\Pipedrive\Resources\Traits\DisablesFind;

class UserSettings extends AbstractResource
{
    /**
     * Enabled abstract methods.
     *
     * @var array
     */
    protected $enabled = ['find'];
}
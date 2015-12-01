<?php

namespace Devio\Pipedrive\Resources;

use Devio\Pipedrive\Resources\Traits\DisablesFind;

class UserConnections extends AbstractResource
{
    /**
     * Enabled abstract methods.
     *
     * @var array
     */
    protected $enabled = ['find'];
}
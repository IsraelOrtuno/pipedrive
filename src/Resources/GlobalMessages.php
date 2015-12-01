<?php

namespace Devio\Pipedrive\Resources;

use Devio\Pipedrive\Resources\Traits\DisablesFind;

class GlobalMessages extends AbstractResource
{
    /**
     * Enabled abstract methods.
     *
     * @var array
     */
    protected $enabled = ['all', 'delete'];
}
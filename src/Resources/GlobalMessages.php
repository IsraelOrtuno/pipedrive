<?php

namespace Devio\Pipedrive\Resources;

use Devio\Pipedrive\Resources\Basics\Resource;

class GlobalMessages extends Resource
{
    /**
     * Enabled abstract methods.
     *
     * @var array
     */
    protected $enabled = ['all', 'delete'];
}

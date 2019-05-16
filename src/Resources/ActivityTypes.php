<?php

namespace Devio\Pipedrive\Resources;

use Devio\Pipedrive\Resources\Basics\Resource;

class ActivityTypes extends Resource
{
    /**
     * Enabled abstract methods.
     *
     * @var array
     */
    protected $enabled = ['all', 'deleteBulk'];
}

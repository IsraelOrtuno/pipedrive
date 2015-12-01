<?php

namespace Devio\Pipedrive\Resources;

use Devio\Pipedrive\Resources\Basics\Resource;

class Files extends Resource
{
    /**
     * Disabled abstract methods.
     *
     * @var array
     */
    protected $disabled = ['deleteBulk'];
}
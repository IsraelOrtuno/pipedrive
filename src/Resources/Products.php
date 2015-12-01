<?php

namespace Devio\Pipedrive\Resources;

use Devio\Pipedrive\Resources\Basics\Resource;
use Devio\Pipedrive\Resources\Traits\FindsByName;

class Products extends Resource
{
    use FindsByName;

    /**
     * Disabled abstract methods.
     *
     * @var array
     */
    protected $disabled = ['deleteBulk'];
}
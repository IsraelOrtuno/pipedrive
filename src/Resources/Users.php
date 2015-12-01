<?php

namespace Devio\Pipedrive\Resources;

use Devio\Pipedrive\Resources\Basics\Resource;
use Devio\Pipedrive\Resources\Traits\FindsByName;
use Devio\Pipedrive\Resources\Traits\ListsFollowers;

class Users extends Resource
{
    use FindsByName,
        ListsFollowers;

    /**
     * Disabled abstract methods.
     *
     * @var array
     */
    protected $disabled = ['delete', 'deleteBulk'];
}
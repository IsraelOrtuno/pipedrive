<?php

namespace Devio\Pipedrive\Resources;

use Devio\Pipedrive\Resources\Basics\Resource;
use Devio\Pipedrive\Resources\Traits\FindsByName;
use Devio\Pipedrive\Resources\Traits\ListsAttachedFiles;
use Devio\Pipedrive\Resources\Traits\ListsPermittedUsers;

class Products extends Resource
{
    use FindsByName,
        ListsAttachedFiles,
        ListsPermittedUsers;

    /**
     * Disabled abstract methods.
     *
     * @var array
     */
    protected $disabled = ['deleteBulk'];
}
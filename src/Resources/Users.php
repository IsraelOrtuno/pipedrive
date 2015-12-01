<?php

namespace Devio\Pipedrive\Resources;

use Devio\Pipedrive\Resources\Traits\FindsByName;

class Users extends AbstractResource
{
    use FindsByName;

    /**
     * Enabled abstract methods.
     *
     * @var array
     */
    protected $enabled = ['all', 'find', 'add', 'update'];
}
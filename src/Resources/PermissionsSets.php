<?php

namespace Devio\Pipedrive\Resources;

use Devio\Pipedrive\Resources\Basics\Resource;

class PermissionsSets extends Resource
{
    /**
     * Enabled abstract methods.
     *
     * @var array
     */
    protected $enabled = ['all', 'find', 'update'];
}
<?php

namespace Devio\Pipedrive\Resources;

class PermissionsSets extends AbstractResource
{
    /**
     * Enabled abstract methods.
     *
     * @var array
     */
    protected $enabled = ['all', 'find', 'update'];
}
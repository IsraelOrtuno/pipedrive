<?php

namespace Devio\Pipedrive\Resources;

class EmailMessages extends AbstractResource
{
    /**
     * Enabled abstract methods.
     *
     * @var array
     */
    protected $enabled = ['find', 'update', 'delete'];
}
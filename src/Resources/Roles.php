<?php

namespace Devio\Pipedrive\Resources;

class Roles extends AbstractResource
{
    /**
     * Disabled abstract methods.
     *
     * @var array
     */
    protected $disabled = ['deleteBulk'];
}
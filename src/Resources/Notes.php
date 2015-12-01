<?php

namespace Devio\Pipedrive\Resources;

class Notes extends AbstractResource
{
    /**
     * Disabled abstract methods.
     *
     * @var array
     */
    protected $disabled = ['deleteBulk'];
}
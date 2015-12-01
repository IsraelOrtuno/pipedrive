<?php

namespace Devio\Pipedrive\Resources;

class Goals extends AbstractResource
{
    /**
     * Disabled abstract methods.
     *
     * @var array
     */
    protected $disabled = ['deleteBulk'];
}
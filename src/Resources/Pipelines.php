<?php

namespace Devio\Pipedrive\Resources;

class Pipelines extends AbstractResource
{
    /**
     * Disabled abstract methods.
     *
     * @var array
     */
    protected $disabled = ['deleteBulk'];
}
<?php

namespace Devio\Pipedrive\Resources;

class Files extends AbstractResource
{
    /**
     * Disabled abstract methods.
     *
     * @var array
     */
    protected $disabled = ['deleteBulk'];
}
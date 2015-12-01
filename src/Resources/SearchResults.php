<?php

namespace Devio\Pipedrive\Resources;

use Devio\Pipedrive\Resources\Traits\DisablesFind;

class SearchResults extends AbstractResource
{
    /**
     * Enabled abstract methods.
     *
     * @var array
     */
    protected $enabled = ['find'];
}
<?php

namespace Devio\Pipedrive\Resources;

use Devio\Pipedrive\Resources\Traits\FindsByName;
use Devio\Pipedrive\Resources\Traits\AddsFollower;
use Devio\Pipedrive\Resources\Traits\ListsFollowers;

class Organizations extends AbstractResource
{
    use FindsByName,
        AddsFollower,
        ListsFollowers;
}
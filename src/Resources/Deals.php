<?php

namespace Devio\Pipedrive\Resources;

use Devio\Pipedrive\Resources\Traits\FindsByName;
use Devio\Pipedrive\Resources\Traits\ListsFollowers;

class Deals extends AbstractResource
{
    use FindsByName,
        ListsFollowers;
}
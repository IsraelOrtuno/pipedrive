<?php

namespace Devio\Pipedrive\Resources;

use Devio\Pipedrive\Resources\Basics\Entity;
use Devio\Pipedrive\Resources\Traits\FindsByName;
use Devio\Pipedrive\Resources\Traits\AddsFollower;
use Devio\Pipedrive\Resources\Traits\ListsFollowers;

class Deals extends Entity
{
    use FindsByName,
        AddsFollower,
        ListsFollowers;
}
<?php

namespace Devio\Pipedrive\Resources;

use Devio\Pipedrive\Resources\Basics\Resource;
use Devio\Pipedrive\Resources\Traits\DeletesInBulk;
use Devio\Pipedrive\Resources\Traits\FieldsMapping;

class Activities extends Resource
{
    use FieldsMapping;
}

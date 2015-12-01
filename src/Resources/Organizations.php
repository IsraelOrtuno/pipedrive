<?php

namespace Devio\Pipedrive\Resources;

use Devio\Pipedrive\Resources\Basics\Entity;
use Devio\Pipedrive\Resources\Traits\ListsDeals;

class Organizations extends Entity
{
    use ListsDeals;

    /**
     * List the persons of a resource.
     *
     * @param       $id      The resource id
     * @param array $options Extra parameters
     * @return mixed
     */
    public function persons($id, $options = [])
    {
        array_set($options, 'id', $id);

        return $this->request->get(':id/persons', $options);
    }
}
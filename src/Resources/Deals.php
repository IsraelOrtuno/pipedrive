<?php

namespace Devio\Pipedrive\Resources;

use Devio\Pipedrive\Resources\Basics\Entity;
use Devio\Pipedrive\Resources\Traits\ListsProducts;

class Deals extends Entity
{
    use ListsProducts;

    /**
     * Duplicate a deal.
     *
     * @param $id The deal id
     * @return mixed
     */
    public function duplicate($id)
    {
        return $this->request->get(':id/duplicate', compact('id'));
    }
}
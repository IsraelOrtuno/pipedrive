<?php

namespace Devio\Pipedrive\Resources\Traits;

trait ListsProducts
{
    /**
     * Get the products attached to a resource.
     *
     * @param       $id      The resource id
     * @param array $options Extra parameters
     * @return mixed
     */
    public function products($id, $options = [])
    {
        array_set($options, 'id', $id);

        return $this->request->get(':id/products', $options);
    }
}

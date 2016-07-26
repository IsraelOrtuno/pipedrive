<?php

namespace Devio\Pipedrive\Resources\Traits;

trait ListsDeals
{
    /**
     * Get the resource deals.
     *
     * @param       $id      The resource id
     * @param array $options Extra parameters
     * @return mixed
     */
    public function deals($id, $options = [])
    {
        array_set($options, 'id', $id);

        return $this->request->get(':id/deals', $options);
    }
}

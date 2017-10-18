<?php

namespace Devio\Pipedrive\Resources\Traits;

trait ListsUpdates
{
    /**
     * Get the resource updates.
     *
     * @param       $id
     * @param array $options
     * @return mixed
     */
    public function updates($id, $options = [])
    {
        array_set($options, 'id', $id);

        return $this->request->get(':id/flow', $options);
    }
}

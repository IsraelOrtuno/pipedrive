<?php

namespace Devio\Pipedrive\Resources\Traits;

trait ListsActivities
{
    /**
     * List the resource activities.
     *
     * @param       $id
     * @param array $options
     * @return mixed
     */
    public function activities($id, $options = [])
    {
        array_set($options, 'id', $id);

        return $this->request->get(':id/activities', $options);
    }
}
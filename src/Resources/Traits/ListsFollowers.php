<?php

namespace Devio\Pipedrive\Resources\Traits;

trait ListsFollowers
{
    /**
     * List the followers of a resource.
     *
     * @param $id
     * @return mixed
     */
    public function followers($id)
    {
        return $this->request->get(':id/followers', compact('id'));
    }
}

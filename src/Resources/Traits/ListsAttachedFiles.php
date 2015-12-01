<?php

namespace Devio\Pipedrive\Resources\Traits;

trait ListsAttachedFiles
{
    /**
     * Get the resource attached files.
     *
     * @param       $id      The resource id
     * @param array $options Extra parameters
     * @return mixed
     */
    public function attachedFiles($id, $options = [])
    {
        array_set($options, 'id', $id);

        return $this->request->get(':id/files', $options);
    }
}
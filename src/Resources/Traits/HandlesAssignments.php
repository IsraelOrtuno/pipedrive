<?php

namespace Devio\Pipedrive\Resources\Traits;

trait HandlesAssignments
{
    /**
     * Get the resource assignments.
     *
     * @param       $id
     * @param array $options
     * @return mixed
     */
    public function assignments($id, $options = [])
    {
        array_set($options, 'id', $id);

        return $this->request->get(':id/assignments', $options);
    }

    /**
     * Add a new assignment to the resource.
     *
     * @param $id
     * @param $user_id
     * @return mixed
     */
    public function addAssignment($id, $user_id)
    {
        return $this->request->post(':id/assignments', compact('id', 'user_id'));
    }

    /**
     * Delete an assignemt from the resource.
     *
     * @param $id
     * @param $user_id
     * @return mixed
     */
    public function deleteAssignment($id, $user_id)
    {
        return $this->request->delete(':id/assignments', compact('id', 'user_id'));
    }
}
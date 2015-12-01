<?php

namespace Devio\Pipedrive\Resources\Traits;

trait AddsFollower
{
    /**
     * Add a follower to a resource.
     *
     * @param $id
     * @param $user_id
     */
    public function addFollower($id, $user_id)
    {
        $this->post(':id/followers', compact('id', 'user_id'));
    }
}
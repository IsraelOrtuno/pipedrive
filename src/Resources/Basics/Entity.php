<?php

namespace Devio\Pipedrive\Resources\Basics;

use Devio\Pipedrive\Resources\Traits\FindsByName;
use Devio\Pipedrive\Resources\Traits\ListsFollowers;

abstract class Entity extends Resource
{
    use FindsByName,
        ListsFollowers;
    
    /**
     * List the resource associated emails.
     *
     * @param       $id      The resource id
     * @param array $options Extra parameters
     */
    public function emails($id, $options = [])
    {
        array_set($options, 'id', $id);
        
        $this->request->get(':id/emailMessages', $options);
    }
    
    /**
     * Add a follower to a resource.
     *
     * @param $id      The resource id
     * @param $user_id The follower id
     */
    public function addFollower($id, $user_id)
    {
        $this->post(':id/followers', compact('id', 'user_id'));
    }

    /**
     * Delete a follower from a resource.
     *
     * @param $id          The resource id
     * @param $follower_id The follower id
     */
    public function deleteFollower($id, $follower_id)
    {
        $this->get(':id/followers/:follower_id', compact('id', 'follower_id'));
    }
}

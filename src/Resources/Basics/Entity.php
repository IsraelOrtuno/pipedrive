<?php

namespace Devio\Pipedrive\Resources\Basics;

use Devio\Pipedrive\Resources\Traits\FindsByName;
use Devio\Pipedrive\Resources\Traits\ListsFollowers;
use Devio\Pipedrive\Resources\Traits\ListsAttachedFiles;
use Devio\Pipedrive\Resources\Traits\ListsPermittedUsers;

abstract class Entity extends Resource
{
    use FindsByName,
        ListsAttachedFiles,
        ListsFollowers,
        ListsPermittedUsers;
    
    /**
     * List the resource associated emails.
     *
     * @param       $id      The resource id
     * @param array $options Extra parameters
     * @return mixed
     */
    public function emails($id, $options = [])
    {
        array_set($options, 'id', $id);
        
        return $this->request->get(':id/emailMessages', $options);
    }
    
    /**
     * Add a follower to a resource.
     *
     * @param $id      The resource id
     * @param $user_id The follower id
     * @return mixed
     */
    public function addFollower($id, $user_id)
    {
        return $this->post(':id/followers', compact('id', 'user_id'));
    }

    /**
     * Delete a follower from a resource.
     *
     * @param $id          The resource id
     * @param $follower_id The follower id
     * @return mixed
     */
    public function deleteFollower($id, $follower_id)
    {
        return $this->delete(':id/followers/:follower_id', compact('id', 'follower_id'));
    }

    /**
     * Merge a resource with another.
     *
     * @param $id            The resource id
     * @param $merge_with_id The id of the resource to merge with
     * @return mixed
     */
    public function merge($id, $merge_with_id)
    {
        return $this->put(':id/merge', compact('id', 'merge_with_id'));
    }
}

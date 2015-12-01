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

    /**
     * List the resource associated emails.
     *
     * @param       $id
     * @param array $options
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
     * @param $id
     * @param $user_id
     * @return mixed
     */
    public function addFollower($id, $user_id)
    {
        return $this->post(':id/followers', compact('id', 'user_id'));
    }

    /**
     * Delete a follower from a resource.
     *
     * @param $id
     * @param $follower_id
     * @return mixed
     */
    public function deleteFollower($id, $follower_id)
    {
        return $this->delete(':id/followers/:follower_id', compact('id', 'follower_id'));
    }

    /**
     * Merge a resource with another.
     *
     * @param $id
     * @param $merge_with_id
     * @return mixed
     */
    public function merge($id, $merge_with_id)
    {
        return $this->put(':id/merge', compact('id', 'merge_with_id'));
    }
}

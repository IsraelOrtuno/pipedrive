<?php

namespace Devio\Pipedrive\Resources\Basics;

use Devio\Pipedrive\Http\Response;
use Devio\Pipedrive\Resources\Traits\FindsByName;
use Devio\Pipedrive\Resources\Traits\ListsActivities;
use Devio\Pipedrive\Resources\Traits\ListsAttachedFiles;
use Devio\Pipedrive\Resources\Traits\ListsFollowers;
use Devio\Pipedrive\Resources\Traits\ListsPermittedUsers;
use Devio\Pipedrive\Resources\Traits\ListsUpdates;

abstract class Entity extends Resource
{
    use FindsByName,
        ListsActivities,
        ListsAttachedFiles,
        ListsFollowers,
        ListsPermittedUsers,
        ListsUpdates;

    /**
     * List the resource associated emails.
     *
     * @param       $id
     * @param array $options
     * @return Response
     */
    public function emails($id, $options = [])
    {
        array_set($options, 'id', $id);

        return $this->request->get(':id/mailMessages', $options);
    }

    /**
     * Add a follower to a resource.
     *
     * @param $id
     * @param $user_id
     * @return Response
     */
    public function addFollower($id, $user_id)
    {
        return $this->request->post(':id/followers', compact('id', 'user_id'));
    }

    /**
     * Delete a follower from a resource.
     *
     * @param $id
     * @param $follower_id
     * @return Response
     */
    public function deleteFollower($id, $follower_id)
    {
        return $this->request->delete(':id/followers/:follower_id', compact('id', 'follower_id'));
    }

    /**
     * Merge a resource with another.
     *
     * @param $id
     * @param $merge_with_id
     * @return Response
     */
    public function merge($id, $merge_with_id)
    {
        return $this->request->put(':id/merge', compact('id', 'merge_with_id'));
    }
}

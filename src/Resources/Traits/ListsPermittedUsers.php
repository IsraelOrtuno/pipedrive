<?php

namespace Devio\Pipedrive\Resources\Traits;

trait ListsPermittedUsers
{
    /**
     * Get the resource permitted users.
     *
     * @param      $id           The resource id
     * @param null $access_level Access level value
     * @return mixed
     */
    public function permittedUsers($id, $access_level = null)
    {
        return $this->request->get(':id/permittedUsers', compact('id', 'access_level'));
    }
}

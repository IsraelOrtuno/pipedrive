<?php

namespace Devio\Pipedrive\Resources;

use Devio\Pipedrive\Resources\Basics\Resource;
use Devio\Pipedrive\Resources\Traits\FindsByName;
use Devio\Pipedrive\Resources\Traits\ListsActivities;
use Devio\Pipedrive\Resources\Traits\ListsUpdates;
use Devio\Pipedrive\Resources\Traits\ListsFollowers;
use Devio\Pipedrive\Resources\Traits\ListsPermittedUsers;

class Users extends Resource
{
    use FindsByName,
        ListsActivities,
        ListsFollowers,
        ListsPermittedUsers,
        ListsUpdates;

    /**
     * Disabled abstract methods.
     *
     * @var array
     */
    protected $disabled = ['delete', 'deleteBulk'];

    /**
     * Get the user blacklisted emails.
     *
     * @param $id
     * @return mixed
     */
    public function blacklistedEmails($id)
    {
        return $this->request->get(':id/blacklistedEmails', compact('id'));
    }

    /**
     * Add a new blacklisted email to the user.
     *
     * @param $id
     * @param $address
     * @return mixed
     */
    public function addBlacklistedEmail($id, $address)
    {
        return $this->request->post(':id/blacklistedEmails', compact('id', 'address'));
    }
}
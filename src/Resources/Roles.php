<?php

namespace Devio\Pipedrive\Resources;

use Devio\Pipedrive\Resources\Basics\Resource;
use Devio\Pipedrive\Resources\Traits\HandlesAssignments;

class Roles extends Resource
{
    use HandlesAssignments;

    /**
     * Disabled abstract methods.
     *
     * @var array
     */
    protected $disabled = ['deleteBulk'];

    /**
     * List the role subroles.
     *
     * @param       $id
     * @param array $options
     * @return mixed
     */
    public function subRoles($id, $options = [])
    {
        array_set($options, 'id', $id);

        return $this->request->get(':id/roles', $options);
    }

    /**
     * List the role settings.
     *
     * @param $id
     * @return mixed
     */
    public function settings($id)
    {
        return $this->request->get(':id/settings', compact('id'));
    }

    /**
     * Add or update a setting value.
     *
     * @param $id
     * @param $setting_key
     * @param $value
     * @return mixed
     */
    public function setSetting($id, $setting_key, $value)
    {
        return $this->request->post(
            ':id/settings', compact('id', 'setting_key', 'value')
        );
    }
}

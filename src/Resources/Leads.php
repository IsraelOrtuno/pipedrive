<?php

namespace Devio\Pipedrive\Resources;

use Devio\Pipedrive\Http\Response;
use Devio\Pipedrive\Resources\Basics\Resource;

class Leads extends Resource
{
    /**
     * Disabled abstract methods.
     *
     * @var array
     */
    protected $disabled = ['deleteBulk'];

    /**
     * Get all labels.
     *
     * @return Response
     */
    public function labels()
    {
        $this->request->setResource('/');
        $result = $this->request->get('leadLabels');

        $this->request->setResource($this->getName());

        return $result;
    }

    /**
     * Add a label.
     *
     * @return Response
     */
    public function addLabel(array $values = [])
    {
        $this->request->setResource('/');
        $result = $this->request->post('leadLabels', $values);

        $this->request->setResource($this->getName());

        return $result;
    }

    /**
     * Delete a label.
     *
     * @return Response
     */
    public function deleteLabel($id)
    {
        $this->request->setResource('/');
        $result = $this->request->delete('leadLabels/' . $id);

        $this->request->setResource($this->getName());

        return $result;
    }

    /**
     * @param $id
     * @param array $values
     * @return Response
     */
    public function update($id, array $values = [])
    {
        $this->request->setResource('/');
        $result = $this->request->put('leadLabels/' . $id, $values);

        $this->request->setResource($this->getName());

        return $result;
    }

    /**
     * Get all sources.
     *
     * @return Response
     */
    public function sources()
    {
        $this->request->setResource('/');
        $result = $this->request->get('leadSources');

        $this->request->setResource($this->getName());

        return $result;
    }
}

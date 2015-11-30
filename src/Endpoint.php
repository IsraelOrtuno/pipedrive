<?php

namespace Devio\Pipedrive;

abstract class Endpoint
{
    /**
     * The API caller object.
     *
     * @var Request
     */
    protected $request;

    /**
     * Endpoint constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $request->setEndpoint($this->getName());

        $this->request = $request;
    }

    /**
     * Get all the entities.
     *
     * @param array      $options   Endpoint accepted options
     */
    public function all($options = [])
    {
        $this->request->get($this->getName(), $options);
    }

    /**
     * Get the entity details by ID.
     *
     * @param $id   Entity ID to find.
     */
    public function find($id)
    {
        $this->request->get($this->getName() . '/:id', compact('id'));
    }

    /**
     * Get the endpoint name based on the name class.
     *
     * @return string
     */
    public function getName()
    {
        return studly_case(get_class($this));
    }
}

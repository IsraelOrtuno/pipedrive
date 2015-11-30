<?php

namespace Devio\Pipedrive;

use ReflectionClass;

abstract class Resource
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
        $request->setResource($this->getName());

        $this->request = $request;
    }

    /**
     * Get all the entities.
     *
     * @param array      $options   Endpoint accepted options
     */
    public function all($options = [])
    {
        $this->request->get('', $options);
    }

    /**
     * Get the entity details by ID.
     *
     * @param $id   Entity ID to find.
     */
    public function find($id)
    {
        $this->request->get('/:id', compact('id'));
    }

    /**
     * Get the endpoint name based on the name class.
     *
     * @return string
     */
    public function getName()
    {
        $reflection = new ReflectionClass($this);

        return camel_case($reflection->getShortName());
    }
}

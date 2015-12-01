<?php

namespace Devio\Pipedrive\Resources;

use ReflectionClass;
use Devio\Pipedrive\Request;
use Devio\Pipedrive\Exceptions\PipedriveException;

abstract class AbstractResource
{
    /**
     * The API caller object.
     *
     * @var Request
     */
    protected $request;

    /**
     * List of abstract methods available.
     *
     * @var array
     */
    protected $enabled = ['*'];

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
        return $this->request->get('', $options);
    }

    /**
     * Get the entity details by ID.
     *
     * @param $id   Entity ID to find.
     */
    public function find($id)
    {
        return $this->request->get(':id', compact('id'));
    }

    /**
     * Delete an entity by ID.
     *
     * @param $id
     */
    public function delete($id)
    {
        return $this->request->delete(':id', compact('id'));
    }

    /**
     * Update an entity by ID.
     *
     * @param       $id
     * @param array $values
     */
    public function update($id, array $values)
    {
        array_add($values, 'id', $id);

        return $this->request->put(':id', $values);
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

    /**
     * Check if the method is enabled for use.
     *
     * @param $method
     * @return bool
     */
    public function isEnabled($method)
    {
        // First we will make sure the method only belongs to this abtract class
        // as this does not have to interfiere with methods described in child
        // classes. We can now check if it is found in the enabled property.
        if (! in_array($method, get_class_methods(get_class()))) {
            return true;
        }

        return in_array($method, $this->enabled) || $this->enabled == ['*'];
    }

    /**
     * Magic method call.
     *
     * @param       $method
     * @param array $args
     * @return mixed
     * @throws PipedriveException
     */
    public function __call($method, $args = [])
    {
        // As there are only a few resources that do not have the most common
        // methods described in this function, we can disable some methods
        // in the `disabled` property of the class throwing an exception.
        if ($this->isEnabled($method)) {
            throw new PipedriveException("The method {$method}() is not available for the resource {$this->getName()}");
        }

        return call_user_func_array(array($this, $method), $args);
    }
}

<?php

namespace Devio\Pipedrive;

use BadMethodCallException;
use Devio\Pipedrive\Http\Client;
use Devio\Pipedrive\Http\PipedriveClient;
use Devio\Pipedrive\Http\Request;
use Illuminate\Support\Str;

class Pipedrive
{
    /**
     * The base URI.
     *
     * @var string
     */
    protected $baseURI = 'https://api.pipedrive.com/v1/';

    /**
     * The API token.
     *
     * @var string
     */
    protected $token;

    /**
     * Api fields mapping.
     *
     * @var array[]
     */
    protected $mapping
        = [
            'activities'    => [],
            'deals'         => [],
            'notes'         => [],
            'organizations' => [],
            'persons'       => [],
            'products'      => [],
        ];

    /**
     * Pipedrive constructor.
     *
     * @param string  $token
     * @param array[] $mapping
     */
    public function __construct($token = '', array $mapping = [])
    {
        $this->token = $token;
        foreach ($mapping as $entity => $map) {
            if (array_key_exists($entity, $this->mapping) && is_array($map)) {
                $this->mapping[$entity] = $map;
            }
        }
    }

    /**
     * Get the resource instance.
     *
     * @param string $resource
     *
     * @return Resource
     */
    public function make($resource)
    {
        $class = $this->resolveClassPath($resource);

        return new $class($this->getRequest());
    }

    /**
     * Get the resource path.
     *
     * @param string $resource
     *
     * @return string
     */
    protected function resolveClassPath($resource)
    {
        return 'Devio\\Pipedrive\\Resources\\'.Str::studly($resource);
    }

    /**
     * Get the request instance.
     *
     * @return Request
     */
    public function getRequest()
    {
        return new Request($this->getClient());
    }

    /**
     * Get the HTTP client instance.
     *
     * @return Client
     */
    protected function getClient()
    {
        return new PipedriveClient($this->getBaseURI(), $this->token);
    }

    /**
     * Get the base URI.
     *
     * @return string
     */
    public function getBaseURI()
    {
        return $this->baseURI;
    }

    /**
     * Set the base URI.
     *
     * @param string $baseURI
     */
    public function setBaseURI($baseURI)
    {
        $this->baseURI = $baseURI;
    }

    /**
     * Set the token.
     *
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * Any reading will return a resource.
     *
     * @param string $name
     *
     * @return Resource
     */
    public function __get($name)
    {
        return $this->make($name);
    }

    /**
     * Methods will also return a resource.
     *
     * @param string $name
     * @param array  $arguments
     *
     * @throws  BadMethodCallException
     * @return mixed
     */
    public function __call($name, array $arguments)
    {
        if (!in_array($name, get_class_methods(get_class()), true)) {
            return $this->{$name};
        }
        throw new \BadMethodCallException;
    }
}

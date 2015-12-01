<?php

namespace Devio\Pipedrive;

use Devio\Pipedrive\Http\PipedriveClient;

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
     * Pipedrive constructor.
     *
     * @param $token
     */
    public function __construct($token = '')
    {
        $this->token = $token;
    }

    /**
     * Get the resource instance.
     *
     * @param $resource
     * @return mixed
     */
    public function make($resource)
    {
        $class = $this->resolveClassPath($resource);

        return new $class($this->getRequest());
    }

    /**
     * Get the resource path.
     *
     * @param $resource
     * @return string
     */
    protected function resolveClassPath($resource)
    {
        return 'Devio\\Pipedrive\\Resources\\' . studly_case($resource);
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
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->make($name);
    }
}
<?php

namespace Devio\Pipedrive;

use Devio\Pipedrive\Http\PipedriveClient4;
use Illuminate\Support\Str;
use Devio\Pipedrive\Http\Request;
use Devio\Pipedrive\Http\PipedriveClient;

class Pipedrive
{
    /**
     * The base URI.
     *
     * @var string
     */
    protected $baseURI;

    /**
     * The API token or oAuth token.
     *
     * @var string
     */
    protected $token;

    /**
     * The oAuth flag.
     *
     * @var bool
     */
    protected $useOAuth;

    /**
     * The guzzle version
     *
     * @var int
     */
    protected $guzzleVersion;

    /**
     * Pipedrive constructor.
     *
     * @param $token
     */
    public function __construct($token = '', $useOAuth = true, $uri = 'https://api.pipedrive.com/v1/', $guzzleVersion = 6)
    {
        $this->token = $token;
        $this->useOAuth = $useOAuth;
        $this->baseURI = $uri;
        $this->guzzleVersion = $guzzleVersion;
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
        return 'Devio\\Pipedrive\\Resources\\' . Str::studly($resource);
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
        if ($this->guzzleVersion >= 6) {
            return new PipedriveClient($this->getBaseURI(), $this->token, $this->useOAuth);
        } else {
            return new PipedriveClient4($this->getBaseURI(), $this->token, $this->useOAuth);
        }
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

    /**
     * Methods will also return a resource.
     *
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if (! in_array($name, get_class_methods(get_class()))) {
            return $this->{$name};
        }
    }
}

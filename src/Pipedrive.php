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
     * The API token.
     *
     * @var string
     */
    protected $token;

    /**
     * The guzzle version
     *
     * @var int
     */
    protected $guzzleVersion;

    protected $isOauth;

    protected $clientId;
    protected $clientSecret;
    protected $redirectUrl;

    protected $storageClass;

    public function isOauth()
    {
        return $this->isOauth;
    }

    /**
     * Pipedrive constructor.
     *
     * @param $token
     */
    public function __construct($token = '', $uri = 'https://api.pipedrive.com/v1/', $guzzleVersion = 6)
    {
        $this->token = $token;
        $this->baseURI = $uri;
        $this->guzzleVersion = $guzzleVersion;

        $this->isOauth = false;
    }

    public static function OAuth($config)
    {
        $guzzleVersion = isset($config['guzzleVersion']) ? $config['guzzleVersion'] : 6;

        $new = new self('oauth', 'https://api-proxy.pipedrive.com/', $guzzleVersion);

        $new->isOauth = true;

        $new->clientId = $config['clientId'];
        $new->clientSecret = $config['clientSecret'];
        $new->redirectUrl = $config['redirectUrl'];

        $new->storageClass = $config['storageClass'];

        return $new;
    }

    public function getClientId()
    {
        return $this->clientId;
    }


    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    public function getStorage()
    {
        $storage = $this->storageClass;
        return new $storage();
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
            return $this->isOauth() ? PipedriveClient::OAuth($this->getBaseURI(), $this->storageClass, $this) : new PipedriveClient($this->getBaseURI(), $this->token);
        } else {
            return new PipedriveClient4($this->getBaseURI(), $this->token);
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
        if (!in_array($name, get_class_methods(get_class()))) {
            return $this->{$name};
        }
    }
}

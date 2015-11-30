<?php

namespace Devio\Pipedrive;

use Devio\Pipedrive\Http\Client;

class Request
{
    /**
     * The endpoint name to play with.
     *
     * @var string
     */
    protected $endpoint = '';

    /**
     * @var Client
     */
    protected $client;

    /**
     * Request constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Prepare and run the query.
     *
     * @param       $type
     * @param       $uri
     * @param array $options
     * @return mixed
     */
    protected function performRequest($type, $uri, $options = [])
    {
        $builder = new Builder($this->getEndpoint());
        $parameters = $builder->getURIParameters($uri);
        $uri = $builder->buildURI($uri, array_only($options, $parameters));

        // We will first extract the parameters required by the endpoint URI. Once
        // got, we can create the URI signature replacing those parameters. Any
        // other info will be part of the query and placed in URL or headers.
        $query = array_except($options, $parameters);

        return $this->executeQuery($type, $uri, $query);
    }

    /**
     * Execute the query against the HTTP client.
     *
     * @param $type
     * @param $uri
     * @param $query
     * @return mixed
     */
    protected function executeRequest($type, $uri, $query = [])
    {
        return call_user_func_array([$this->client, $type], [$uri, $query]);
    }

    /**
     * Get the endpoint name.
     *
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * Set the endpoint name.
     *
     * @param string $endpoint
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * @param       $name
     * @param array $args
     * @return mixed
     */
    public function __call($name, $args = [])
    {
        if (in_array($name, ['get', 'post', 'put', 'delete'])) {
            return $this->performRequest($name, $args[0], $args);
        }
    }
}

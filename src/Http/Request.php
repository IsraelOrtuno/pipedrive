<?php

namespace Devio\Pipedrive\Http;

use Devio\Pipedrive\Builder;
use Devio\Pipedrive\Exceptions\PipedriveException;
use Devio\Pipedrive\Exceptions\ItemNotFoundException;

class Request
{
    /**
     * The Http client instance.
     *
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
        $this->builder = $this->client->isOauth() ? new Builder() : Builder::OAuth();
    }

    /**
     * Prepare and run the query.
     *
     * @param       $type
     * @param       $target
     * @param array $options
     * @return mixed
     */
    protected function performRequest($type, $target, $options = [])
    {
        $this->builder->setTarget($target);

        $endpoint = $this->builder->buildEndpoint($options);
        // We will first extract the parameters required by the endpoint URI. Once
        // got, we can create the URI signature replacing those parameters. Any
        // other info will be part of the query and placed in URL or headers.
        $query = $this->builder->getQueryVars($options);

        return $this->executeRequest($type, $endpoint, $query);
    }

    /**
     * Execute the query against the HTTP client.
     *
     * @param $type
     * @param $endpoint
     * @param $query
     * @return mixed
     */
    protected function executeRequest($type, $endpoint, $query = [])
    {
        return $this->handleResponse(
            call_user_func_array([$this->client, $type], [$endpoint, $query])
        );
    }

    /**
     * Handling the server response.
     *
     * @param Response $response
     * @return mixed
     * @throws ItemNotFoundException
     * @throws PipedriveException
     */
    protected function handleResponse(Response $response)
    {
        $content = $response->getContent();

        // If the request did not succeed, we will notify the user via Exception
        // and include the server error if found. If it is OK and also server
        // inludes the success variable, we will return the response data.
        if (!isset($content) || !($response->getStatusCode() == 302 || $response->isSuccess())) {
            if ($response->getStatusCode() == 404) {
                throw new ItemNotFoundException($content->error);
            }

            throw new PipedriveException(
                isset($content->error) ? $content->error : "Error unknown."
            );
        }

        return $response;
    }

    /**
     * Set the endpoint name.
     *
     * @param string $resource
     */
    public function setResource($resource)
    {
        $this->builder->setResource($resource);
    }

    /**
     * Set the token.
     *
     * @param string $token
     */
    public function setToken($token)
    {
        $this->builder->setToken($token);
    }

    /**
     * Pointing request operations to the request performer.
     *
     * @param       $name
     * @param array $args
     * @return mixed
     */
    public function __call($name, $args = [])
    {
        if (in_array($name, ['get', 'post', 'put', 'delete'])) {
            $options = !empty($args[1]) ? $args[1] : [];

            // Will pass the function name as the request type. The second argument
            // is the URI passed to the method. The third parameter will include
            // the request option values array which are stored in the index 1.
            return $this->performRequest($name, $args[0], $options);
        }
    }
}

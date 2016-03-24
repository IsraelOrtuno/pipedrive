<?php

namespace Devio\Pipedrive\Http;

use BadMethodCallException;
use Devio\Pipedrive\Builder;
use Devio\Pipedrive\Exceptions\PipedriveException;
use Devio\Pipedrive\Exceptions\ItemNotFoundException;

/**
 * Class Request
 *
 * @method Response get($url, $parameters = []);
 * @method Response post($url, $parameters = []);
 * @method Response put($url, $parameters = []);
 * @method Response delete($url, $parameters = []);
 */
class Request
{
    /**
     * The Http client instance.
     *
     * @var Client
     */
    protected $client;

    /**
     * The request builder instance.
     *
     * @var Builder
     */
    protected $builder;

    /**
     * Request constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->builder = new Builder();
    }

    /**
     * Prepare and run the query.
     *
     * @param string $type
     * @param string $target
     * @param array  $options
     *
     * @throws ItemNotFoundException
     * @throws PipedriveException
     *
     * @return Response
     */
    protected function performRequest($type, $target, array $options = [])
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
     * @param string $type
     * @param string $endpoint
     * @param array  $query
     *
     * @throws ItemNotFoundException
     * @throws PipedriveException
     * @return Response
     */
    protected function executeRequest($type, $endpoint, array $query = [])
    {
        return $this->handleResponse(
            call_user_func_array([$this->client, $type], [$endpoint, $query])
        );
    }

    /**
     * Handling the server response.
     *
     * @param Response $response
     *
     * @throws ItemNotFoundException
     * @throws PipedriveException
     *
     * @return Response
     */
    protected function handleResponse(Response $response)
    {
        $content = $response->getContent();

        // If the request did not succeed, we will notify the user via Exception
        // and include the server error if found. If it is OK and also server
        // includes the success variable, we will return the response data.
        if (empty($content) || !$response->isSuccess()) {
            if ($response->getStatusCode() === 404) {
                throw new ItemNotFoundException($content->error);
            }

            throw new PipedriveException(
                isset($content->error) ? $content->error : 'Error unknown.'
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
     * @param string $name
     * @param array  $args
     *
     * @throws ItemNotFoundException
     * @throws PipedriveException
     * @throws BadMethodCallException
     * @return Response
     */
    public function __call($name, array $args = [])
    {
        if (in_array($name, ['get', 'post', 'put', 'delete'], true)) {
            $options = !empty($args[1]) ? $args[1] : [];

            // Will pass the function name as the request type. The second argument
            // is the URI passed to the method. The third parameter will include
            // the request option values array which are stored in the index 1.
            return $this->performRequest($name, $args[0], $options);
        }
        throw new BadMethodCallException();
    }
}

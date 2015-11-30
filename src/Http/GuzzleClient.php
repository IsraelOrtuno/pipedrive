<?php

namespace Devio\Pipedrive\Http;

use GuzzleHttp\Client as HttpClient;

class GuzzleClient implements Client
{
    /**
     * The Guzzle client instance.
     *
     * @var Client
     */
    protected $client;

    /**
     * GuzzleClient constructor.
     *
     * @param HttpClient $client
     */
    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Perform a GET request.
     *
     * @param       $url
     * @param array $options
     * @return mixed
     */
    public function get($url, $options = [])
    {
        return $this->client->get($url, $options);
    }

    /**
     * Perform a POST request.
     *
     * @param       $url
     * @param array $options
     * @return mixed
     */
    public function post($url, $options = [])
    {
        return $this->client->post($url, $options);
    }

    /**
     * Perform a PUT request.
     *
     * @param       $url
     * @param array $options
     * @return mixed
     */
    public function put($url, $options = [])
    {
        return $this->client->put($url, $options);
    }

    /**
     * Perform a DELETE request.
     *
     * @param       $url
     * @param array $options
     * @return mixed
     */
    public function delete($url, $options = [])
    {
        return $this->client->delete($url, $options);
    }
}

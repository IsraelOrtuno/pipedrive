<?php

namespace Devio\Pipedrive\Http;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ServerException;

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
     * @return Response
     */
    public function get($url, $options = [])
    {
        return $this->execute('get', $url, $options);
    }

    /**
     * Perform a POST request.
     *
     * @param       $url
     * @param array $options
     * @return Response
     */
    public function post($url, $options = [])
    {
        return $this->execute('post', $url, $options);
    }

    /**
     * Perform a PUT request.
     *
     * @param       $url
     * @param array $options
     * @return Response
     */
    public function put($url, $options = [])
    {
        return $this->execute('put', $url, $options);
    }

    /**
     * Perform a DELETE request.
     *
     * @param       $url
     * @param array $options
     * @return Response
     */
    public function delete($url, $options = [])
    {
        return $this->execute('delete', $url, $options);
    }

    /**
     * Execute the request and returns the Response object.
     *
     * @param       $method
     * @param       $url
     * @param array $options
     * @return Response
     */
    protected function execute($method, $url, $options = [])
    {
        try {
            $response = $this->client->{$method}($url, $options);

            return new Response(
                $response->getStatusCode(), json_decode($response->getBody())
            );
        } catch (BadResponseException $e) {
            return new Response(
                $e->getCode(), json_decode($e->getResponse()->getBody())
            );
        }

    }
}

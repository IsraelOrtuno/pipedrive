<?php

namespace Devio\Pipedrive\Http;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\BadResponseException;

class PipedriveClient implements Client
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
     * @param $url
     * @param $token
     */
    public function __construct($url, $token)
    {
        $this->client = new GuzzleClient([
            'base_uri' => $url,
            'query' => [
                'token' => $token
            ]
        ]);
    }

    /**
     * Perform a GET request.
     *
     * @param       $url
     * @param array $parameters
     * @return Response
     */
    public function get($url, $parameters = [])
    {
        $options = $this->getClient()
                        ->getConfig();
        array_set(
            $options, 'query', array_merge($parameters, $options['query'])
        );

        // For this particular case we have to include the parameters into the
        // URL query. Merging the request default query configuration to the
        // request parameters will make the query key contain everything.
        return $this->execute(new Request('GET', $url), $options);
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
        // TODO: to implement
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
        // TODO: to implement
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
        // TODO: to implement
    }

    /**
     * Execute the request and returns the Response object.
     *
     * @param Request $request
     * @param array   $options
     * @param null    $client
     * @return Response
     */
    protected function execute(Request $request, array $options = [], $client = null)
    {
        $client = $client ?: $this->getClient();

        // We will just execute the given request using the default or given client
        // and with the passed options wich may contain the query, body vars, or
        // any other info. Both OK and fail will generate a response object.
        try {
            $response = $client->send($request, $options);
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
        } finally {
            // As there are a few responses that are supposed to perform the
            // download of a file, we will filter them. If found, we will
            // set the file download URL as the response content data.
            $body = $response->getHeader('location') ?: json_decode($response->getBody(), true);

            return new Response(
                $response->getStatusCode(), $body
            );
        }
    }

    /**
     * Return the client.
     *
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }
}

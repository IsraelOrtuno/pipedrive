<?php

namespace Devio\Pipedrive\Http;

interface Client
{
    /**
     * Perform a GET request.
     *
     * @param       $url
     * @param array $options
     * @return Response
     */
    public function get($url, $options = []);

    /**
     * Perform a POST request.
     *
     * @param       $url
     * @param array $options
     * @return Response
     */
    public function post($url, $options = []);

    /**
     * Perform a PUT request.
     *
     * @param       $url
     * @param array $options
     * @return Response
     */
    public function put($url, $options = []);

    /**
     * Perform a DELETE request.
     *
     * @param       $url
     * @param array $options
     * @return Response
     */
    public function delete($url, $options = []);
}
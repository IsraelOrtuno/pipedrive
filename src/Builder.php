<?php

namespace Devio\Pipedrive;

class Builder
{
    /**
     * URI endpoing.
     *
     * @var string
     */
    protected $endpoint;

    /**
     * Builder constructor.
     *
     * @param string $endpoint
     */
    public function __construct($endpoint = '')
    {
        $this->endpoint = $endpoint;
    }

    /**
     * Get the name of the URI parameters.
     *
     * @param $uri
     * @return int
     */
    public function getURIParameters($uri)
    {
        preg_match_all('/:\w+/', $uri, $result);

        return str_replace(':', '', array_flatten($result));
    }

    /**
     * Replace URI tags by the values in options.
     *
     * buildUri(':id', ['id' => 55', 'name' => 'foo'])
     * will give:
     * 'organizations/55'
     *
     * @param       $uri
     * @param array $options
     * @return mixed
     */
    public function buildUri($uri, $options = [])
    {
        if (! empty($this->endpoint)) {
            $uri = $this->endponit . '/' . $uri;
        }

        // Having the uri, we'll now replace every parameter preceed with a colon
        // character with the values matching the keys of the options array. If
        // any of these parameters is not set we'll notify with an exception.
        foreach ($options as $key => $value) {
            $uri = preg_replace("/:{$key}/", $value, $uri);
        }

        if (count($this->getURIParameters($uri))) {
            throw new \InvalidArgumentException('The URI contains unassigned params.');
        }

        return $uri;
    }

    /**
     * Get the options that are not replaced in the URI.
     *
     * @param       $uri
     * @param array $options
     * @return array
     */
    public function getQueryVars($uri, $options = [])
    {
        $uriVars = $this->getURIParameters($uri);

        return array_except($options, $uriVars);
    }
}
<?php

namespace Devio\Pipedrive;

use Devio\Pipedrive\Exceptions\TokenNotSetException;

class Builder
{
    /**
     * API base URL.
     *
     * @var string
     */
    protected $base = 'https://api.pipedrive.com/v1/{endpoint}';

    /**
     * Resource name.
     *
     * @var string
     */
    protected $resource = '';

    /**
     * Full URI without resource.
     *
     * @var string
     */
    protected $target = '';

    /**
     * The API token.
     *
     * @var string
     */
    protected $token;

    protected $isOauth = false;

    public function isOauth()
    {
        return $this->isOauth;
    }

    public static function OAuth()
    {
        $new = new self();

        $new->base = 'https://api-proxy.pipedrive.com/{endpoint}';
        $new->isOauth = true;

        return $new;
    }

    /**
     * Get the name of the URI parameters.
     *
     * @param string $target
     * @return array
     */
    public function getParameters($target = '')
    {
        if (empty($target)) {
            $target = $this->getTarget();
        }

        preg_match_all('/:\w+/', $target, $result);

        return str_replace(':', '', array_flatten($result));
    }

    /**
     * Replace URI tags by the values in options.
     *
     * buildUri(':id', ['id' => 55', 'name' => 'foo'])
     * will give:
     * 'organizations/55'
     *
     * @param array $options
     * @return mixed
     */
    public function buildEndpoint($options = [])
    {
        $endpoint = $this->getEndpoint();

        // Having the URI, we'll now replace every parameter preceed with a colon
        // character with the values matching the keys of the options array. If
        // any of these parameters is not set we'll notify with an exception.
        foreach ($options as $key => $value) {
            if (is_array($value)) {
                continue;
            }

            $endpoint = preg_replace("/:{$key}/", $value, $endpoint);
        }

        if (count($this->getParameters($endpoint))) {
            throw new \InvalidArgumentException('The URI contains unassigned params.');
        }

        return $endpoint;
    }

    /**
     * Get the full URI with the endpoint if any.
     *
     * @return string
     * @throws TokenNotSetException
     */
    protected function getEndpoint()
    {
        $result = $this->getTarget();

        if (!empty($this->getResource())) {
            $result = $this->getResource() . '/' . $result;
        }

        return $result;
    }

    /**
     * Get the options that are not replaced in the URI.
     *
     * @param array $options
     * @return array
     */
    public function getQueryVars($options = [])
    {
        $vars = $this->getParameters();

        return array_except($options, $vars);
    }

    /**
     * Get the resource name.
     *
     * @return string
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * Set the resource name.
     *
     * @param string $name
     */
    public function setResource($name)
    {
        $this->resource = $name;
    }

    /**
     * Get the target.
     *
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Set the target.
     *
     * @param string $target
     */
    public function setTarget($target)
    {
        $this->target = $target;
    }

    /**
     * Set the application token.
     *
     * @param $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * Get the base URL.
     *
     * @return string
     */
    public function getBase()
    {
        return $this->base;
    }
}

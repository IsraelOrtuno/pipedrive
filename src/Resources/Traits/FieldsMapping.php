<?php

namespace Devio\Pipedrive\Resources\Traits;

use Devio\Pipedrive\Http\Response;

trait FieldsMapping
{
    /**
     * Resource mapping.
     *
     * @var array
     */
    protected $mapping = [];

    /**
     * Set resource mapping.
     *
     * @param array $map
     */
    public function setMapping(array $map)
    {
        $this->mapping = $map;
    }

    /**
     * Replace keys.
     *
     * @param array $values
     * @param array $map
     *
     * @return array
     */
    protected function map(array $values, $map)
    {
        $result = [];
        foreach ($values as $key => $value) {
            if (array_key_exists($key, $map)) {
                $result[$map[$key]] = $value;
            }
            $result[$key] = $value;
        }

        return $result;
    }


    /**
     * Get all the entities.
     *
     * @param array $options Endpoint accepted options
     *
     * @return Response
     */
    public function all(array $options = [])
    {
        /* @var Response $response */
        $response = parent::all($options);
        if ($response->isSuccess() && count($this->mapping) !== 0) {
            $content = json_decode(json_encode($response->getContent()), true);
            $content['data'] = array_map(function ($value) {
                return $this->map($value, $this->mapping);
            }, $content['data']);
            $response = new Response(
                $response->getStatusCode(),
                json_decode(json_encode($content)),
                $response->getHeaders()
            );
        }

        return $response;
    }

    /**
     * Get the entity details by ID.
     *
     * @param integer $id Entity ID to find.
     *
     * @return Response
     */
    public function find($id)
    {
        /* @var Response $response */
        $response = parent::find($id);
        if ($response->isSuccess() && count($this->mapping) !== 0) {
            $content = json_decode(json_encode($response->getContent()), true);
            $content['data'] = $this->map($content['data'], $this->mapping);
            $response = new Response(
                $response->getStatusCode(),
                json_decode(json_encode($content)),
                $response->getHeaders()
            );
        }

        return $response;
    }
    
    /**
     * Add a new entity.
     *
     * @param array $values
     *
     * @return Response
     */
    public function add(array $values)
    {
        return parent::add($this->map($values, array_flip($this->mapping)));
    }

    /**
     * Update an entity by ID.
     *
     * @param integer $id
     * @param array   $values
     *
     * @return Response
     */
    public function update($id, array $values)
    {
        return parent::update($id, $this->map($values, array_flip($this->mapping)));
    }
}
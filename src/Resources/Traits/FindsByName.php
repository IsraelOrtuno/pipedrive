<?php

namespace Devio\Pipedrive\Resources\Traits;

trait FindsByName
{
    /**
     * Find an element by name.
     *
     * @param       $term
     * @param array $options
     */
    public function findByName($term, $options = [])
    {
        $options['term'] = $term;

        return $this->request->get('find', $options);
    }
}
<?php

namespace Devio\Pipedrive\Resources;

use Devio\Pipedrive\Resources\Basics\Resource;

class Authorizations extends Resource 
{
    /**
     * Enabled methods
     * 
     * @var array
     */
    protected $enabled = ['authorize'];

    /**
     * Get authorizations for user without API key.
     * 
     * @param  string $email    Email for the user
     * @param  string $password Password for the user
     * @return [type]           [description]
     */
    public function authorize($email, $password) {
        return $this->request->post('/', compact('email', 'password'));
    }
}
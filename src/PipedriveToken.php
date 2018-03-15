<?php

namespace Devio\Pipedrive;

use GuzzleHttp\Client as GuzzleClient;

class PipedriveToken
{
    protected $access_token;
    protected $expires_at;
    protected $refresh_token;

    public function __construct($config)
    {
        $assign = ['access_token', 'expires_at', 'refresh_token'];
        foreach ($assign as $a) {
            $this->{$a} = !empty($config[$a]) ? $config[$a] : null;
        }
    }

    public function access_token()
    {
        return $this->access_token;
    }

    public function expires_at()
    {
        return $this->expires_at;
    }

    public function refresh_token()
    {
        return $this->refresh_token;
    }

    public function refresh_if_needed($pipedrive)
    {
        if ($this->needs_refresh()) {
            $client = new GuzzleClient([
                'headers' => [

                ],
                'auth' => [
                    $pipedrive->getClientId(),
                    $pipedrive->getClientSecret()
                ]
            ]);
            $response = $client->request('POST', 'https://oauth.pipedrive.com/oauth/token', [
                'form_params' => [
                    'grant_type' => 'refresh_token',
                    'refresh_token' => $this->refresh_token
                ]
            ]);
            $new_token = json_decode($response->getBody());

            $this->access_token = $new_token->access_token;
            $this->expires_at = time() + $new_token->expires_in;
            $this->refresh_token = $new_token->refresh_token;

            $storage = $pipedrive->getStorage();

            $storage::setToken($this);
        }
    }

    public function needs_refresh()
    {
        return (int)$this->expires_at - time() < 1;
    }
}

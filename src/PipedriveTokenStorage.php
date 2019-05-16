<?php

namespace Devio\Pipedrive;

interface PipedriveTokenStorage
{
    public function setToken(PipedriveToken $token);

    public function getToken();
}

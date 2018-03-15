<?php

namespace Devio\Pipedrive;

use Devio\Pipedrive\PipedriveToken;

interface PipedriveTokenStorage
{
    public static function setToken(PipedriveToken $token);

    public static function getToken();
}

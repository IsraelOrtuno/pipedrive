<?php

namespace Devio\Pipedrive;

interface PipedriveTokenStorage
{

	/**
	 * @param PipedriveToken $token
	 */
    public function setToken(PipedriveToken $token);

	/**
	 * @return PipedriveToken
	 */
    public function getToken();
}

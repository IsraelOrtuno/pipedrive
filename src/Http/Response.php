<?php

namespace Devio\Pipedrive\Http;

class Response
{
    /**
     * @var
     */
    protected $statusCode;

    /**
     * @var
     */
    protected $content;

    /**
     * Response constructor.
     *
     * @param $statusCode
     * @param $content
     */
    public function __construct($statusCode, $content)
    {
        $this->statusCode = $statusCode;
        $this->content = $content;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

}
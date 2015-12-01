<?php

namespace Devio\Pipedrive\Http;

class Response
{
    /**
     * The response code.
     *
     * @var integer
     */
    protected $statusCode;

    /**
     * The response data.
     *
     * @var mixed
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
     * Get the status code.
     *
     * @return integer
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Get the content.
     *
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }
}

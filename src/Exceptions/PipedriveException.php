<?php

namespace Devio\Pipedrive\Exceptions;

use Throwable;

class PipedriveException extends \Exception
{
    protected $error_info = '';
    protected $data;
    protected $additional_data;
    protected $success;

    public function __construct(
        string $message = "",
        int $code = 0,
        Throwable $previous = null,
        ?string $error_info = '',
        $additional_data = null,
        $data = null,
        bool $success = false
    )
    {
        parent::__construct($message, $code, $previous);
        $this->error_info = $error_info;
        $this->additional_data = $additional_data;
        $this->data = $data;
        $this->success = $success;
    }

    public function getErrorInfo(): ?string
    {
        return $this->error_info;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getAdditionalData()
    {
        return $this->additional_data;
    }

    public function isSuccess(): bool
    {
        return $this->success;
    }


}

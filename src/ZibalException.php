<?php

namespace Aryandev\zibal;

class ZibalException extends \Exception
{
    /**
     * @var \stdClass
     */
    private \stdClass $resp;
    /**
     * @param \stdClass $response
     */
    public function __construct(\stdClass $response)
    {
        $this->resp = $response;

    }

    /**
     * @return string
     */
    public function getZibalMessage(): string
    {
        return"result: {$this->resp->result} \nmessage: {$this->resp->message}";
    }
    public function getZibalResultCode(): string
    {
        return $this->resp->result;
    }
}
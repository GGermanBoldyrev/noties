<?php

namespace app\core;

class Response
{
    // Set response code
    public function setStatusCode($code): void
    {
        http_response_code($code);
    }
}
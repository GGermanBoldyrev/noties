<?php

namespace app\core;

class Response
{
    // Устанавливает код ответа
    public function setStatusCode($code)
    {
        http_response_code($code);
    }
}
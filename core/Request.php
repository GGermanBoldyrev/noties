<?php

namespace app\core;

class Request
{
    // Method to get path
    public function getPath(): string
    {
        // We get path or "/"
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        // Search for "?" position
        $position = strpos($path, '?');

        // If there are no get params, we just simply return url
        if (!$position) {
            return $path;
        }

        // If get params are exist, substring url up to "?"
        return substr($path, 0, $position);
    }

    // We get request method (lowercase)
    public function getMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    // Get data from request and return an array
    public function getBody(): array
    {
        $body = [];

        if ($this->getMethod() === 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key,FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->getMethod() === 'post') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key,FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}
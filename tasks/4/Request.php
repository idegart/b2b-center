<?php

class Request
{
    private array $getData;

    public function __construct()
    {
        $this->getData = $_GET;
    }

    public function get(string $key, $default = null)
    {
        return $this->getData[$key] ?? $default;
    }
}
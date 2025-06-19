<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected array $responseMessage;

    /**
     * @param string $key
     * @return string
     */
    protected function getResponseMessage(string $key): string
    {
        return $this->responseMessage[$key];
    }
}

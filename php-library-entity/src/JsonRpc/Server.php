<?php

namespace JsonRpc;

use Controllers\AuthorController;
use Controllers\BookController;
use Controllers\LoanController;

class Server
{
    private $controllers;

    public function __construct()
    {
        $this->controllers = [
            'author' => new AuthorController(),
            'book' => new BookController(),
            'loan' => new LoanController(),
        ];
    }

    public function handleRequest($request)
    {
        $method = $request['method'];
        $params = $request['params'] ?? [];

        if (isset($this->controllers[$params['entity']])) {
            return $this->controllers[$params['entity']]->{$method}($params);
        }

        return [
            'jsonrpc' => '2.0',
            'error' => [
                'code' => -32601,
                'message' => 'Method not found',
            ],
            'id' => $request['id'] ?? null,
        ];
    }
}
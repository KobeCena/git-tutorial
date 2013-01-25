<?php

namespace Micro\Dispatcher;

use Micro\Request\RequestInterface,
Micro\Response\ResponseInterface;

interface Dispatchable
{
    /**
     * Dispatches the given request and adds to the response
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     */
    public function dispatch(RequestInterface $request, ResponseInterface $response);
}
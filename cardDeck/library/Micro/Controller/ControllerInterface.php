<?php

namespace Micro\Controller;

use Micro\Request\RequestInterface,
Micro\Config\ArrayConfig;

interface ControllerInterface
{
    /**
     * Sets the currently dispatched request
     *
     * @param RequestInterface $request
     */
    public function setRequest(RequestInterface $request);

    /**
     * Sets the controller config
     *
     * @param ArrayConfig $config
     */
    public function setConfig(ArrayConfig $config);

    /**
     * Multiple require for all Models
     *
     * @param  String $pattern
     */
    public function requireOnceMany( $pattern );

    /**
     * Get $_REQUEST Values
     *
     */
    public function ajaxParams( );
}
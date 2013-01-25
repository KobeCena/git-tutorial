<?php

namespace Micro\Router;

interface ResultInterface
{
    /**
     * Gets the name of the controller
     *
     * @return string
     */
    public function getController();

    /**
     * Gets the name of the action
     *
     * @return string
     */
    public function getAction();

    /**
     * Gets any and all additional params
     *
     * @return array
     */
    public function getParams();
}
<?php
namespace Micro\Request;
interface RequestInterface
{
    /**
     * Gets the name of the current action
     *
     * @return string
     */
    public function getAction();

    /**
     * Gets the name of the current controller
     *
     * @return string
     */
    public function getController();

    /**
     * Gets the parameters of the current request
     *
     * @return array
     */
    public function getParams();
}
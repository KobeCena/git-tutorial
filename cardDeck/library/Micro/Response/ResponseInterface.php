<?php

namespace Micro\Response;

interface ResponseInterface
{
    /**
     * Appends a value to the response body
     *
     * The content can be of any type so long as that type can be casted to a
     * string.
     *
     * @param  string $name
     * @param  mixed  $content
     */
    public function append($name, $content);

    /**
     * Prepends a value to the response body
     *
     * The content can be of any type so long as that type can be casted to a
     * string.
     *
     * @param  string $name
     * @param  mixed  $content
     */
    public function prepend($name, $content);

    /**
     * Send the response to screen
     */
    public function send();
}
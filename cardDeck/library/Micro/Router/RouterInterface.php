<?php

namespace Micro\Router;

interface RouterInterface
{
    /**
     * Parses the given uri agaisnt a simple scheme and returns parse result
     *
     * @param  string $uri
     * @return ResultInterface
     */
    public function parseUri($uri);
}
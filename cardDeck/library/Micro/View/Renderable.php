<?php

namespace Micro\View;

interface Renderable
{
    /**
     * Generates and returns a view's output
     *
     * @param string $str
     */
    public function render($str);
}
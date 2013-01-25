<?php

namespace App\Controller;

use Micro\Controller\AbstractController,
Micro\Exception\NotFoundException,
Exception;

class ErrorController extends AbstractController
{
    public function defaultAction(Exception $exception, array $params)
    {
        $view = $this->getView();
        $view->request = $this->getRequest();

        $debugConfig = $this->getConfig()->debug;
        if ($debugConfig && $debugConfig->renderExceptions) {
            $view->exception = $exception;
        }

        if ($exception instanceof NotFoundException) {
            return $view->render('error/not-found');
        }

        return $view->render('error/default');
    }
}
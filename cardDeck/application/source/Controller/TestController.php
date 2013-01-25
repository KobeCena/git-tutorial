<?php

namespace App\Controller;

use Micro\Controller\AbstractController;

class TestController extends AbstractController
{

    public function createAction()
    {
        $testModel = new \App\Model\Test_Model();
        $view = $this->getView();
        $view->dbvalues = "Nothing";
        $params = $this->getRequest()->getParams();
        if ( isset( $params[0] ) ) {
            switch( $params[0] ) {
                case "card" :
                    $view->dbvalues = $params[0];
                    $view->cardcount = $params[1];
                    $count = ( isset( $params[1] ) && is_numeric( $params[1] ) ) ? floor( $params[1] ) : 0 ;
                    $testModel->createCards( $count );
                    break;
                case "skill" :
                    $view->dbvalues = $params[0];
                    $view->skill = urldecode( $params[1] );
                    $skillName = ( isset( $params[1] ) ) ? urldecode( $params[1] ) : "" ;
                    $testModel->createSkills( $skillName );
                    break;
                default : break;
            }
        }
        return $view->render('test/create');
    }
}
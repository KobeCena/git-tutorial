<?php

namespace App\Controller;

use Micro\Controller\AbstractController;

class DefaultController extends AbstractController
{

    public function defaultAction()
    {
        $view = $this->getView();
        $user = new \App\Model\User_Model();
        $view->users = $user->getAllUsers();
        $card = new \App\Model\Card_Model();
        $view->allCards = $card->getAllCards();
        return $this->getView()->render('default/default');
    }

    public function createUserAction()
    {
        $view = $this->getView();
        $params = $this->ajaxParams();
        $user = new \App\Model\User_Model();
        if( isset( $params['username'] ) ) {
            $response = $user->createUser( $params['username'] );
            if( $response['success'] ) {
                $view->users = $response['result'];
                return json_encode( array( "success" => true , "html" => $this->getView()->render("ajax/user-panel") ) );
            } else {
                return json_encode( $response );
            }
        } else {
            return json_encode( array( "success" => false , "error" => "No Username Given" ) );
        }
    }


    public function createUserDeckAction()
    {
        $view = $this->getView();
        $params = $this->ajaxParams();
        $deck = new \App\Model\Deck_Model();
        if( isset( $params['deckname'] ) ) {
            $response = $deck->createUserDeck( $params['userid'] , $params['deckname'] );
            if( $response['success'] ) {
                $view->deckInfo = $response['result'];
                return json_encode( array( "success" => true , "html" => $this->getView()->render("ajax/deck-panel") ) );
            } else {
                return json_encode( $response );
            }
        } else {
            return json_encode( array( "success" => false , "error" => "No Deck Name Given" ) );
        }
    }

    public function getUsersDeckAction()
    {
        $view = $this->getView();
        $view->cardPerDeck = 3;
        $params = $this->ajaxParams();
        $user = new \App\Model\User_Model();
        if( isset( $params['userid'] ) ) {
            $userInfo = $user->getUserInfo( $params['userid'] );
            if( $userInfo['success'] ) {
                $view->userInfo = $userInfo['result']['user'];
                $view->deckInfo = $userInfo['result']['deck'];
                return json_encode( array( "success" => true , "html" => $this->getView()->render("ajax/card-deck-info") ) );
            } else {
                return json_encode( $userInfo );
            }
        } else {
            return json_encode( array( "success" => false , "error" => "No UserID Given" ) );
        }
    }

    public function getCurrentDeckAction()
    {
        $view = $this->getView();
        $view->cardPerDeck = 3;
        $view->currentDeckSelected = true;
        $params = $this->ajaxParams();
        if( isset( $params['deckid'] ) ) {
            $deck = new \App\Model\Deck_Model();
            $currentDeck = $deck->getCurrentDeckCards( $params['deckid'] );
            $view->deckCards = $currentDeck['result'];
            $view->deckSummary = $currentDeck['summary'];
            return json_encode( array( "success" => true , "html" => $this->getView()->render("ajax/deck-cards") ) );
        } else {
            return json_encode( array( "success" => false , "error" => "No Deck Reference Given" ) );
        }
    }

    public function saveCardDeckInfoAction()
    {
        $view = $this->getView();
        $view->cardPerDeck = 3;
        $view->currentDeckSelected = true;
        $params = $this->ajaxParams();
        $deck = new  \App\Model\Deck_Model();
        $deckInfo = $deck->saveCardDeckInfo( $params );
        if( isset( $deckInfo['success'] ) && $deckInfo['success'] == false ) {
            return json_encode( $deckInfo );
        } else {
            $view->deckCards = $deckInfo['result'];
            $view->deckSummary = $deckInfo['summary'];
            return json_encode( array( "success" => true , "html" => $this->getView()->render("ajax/deck-cards") ) );
        }
    }

    public function generateCardsAction()
    {
        $params = $this->ajaxParams();
        $card = new \App\Model\Card_Model();
        if( isset( $params['count'] ) ) {
            $card->createCards( $params['count'] );
            return json_encode( array( "success" => true ) );
        } else {
            return json_encode( array( "success" => false , "error" => "Unable to Generate Card(s)" ) );
        }
    }

    public function createSkillAction()
    {
        $params = $this->ajaxParams();
        $card = new \App\Model\Card_Model();
        if( isset( $params['skillname'] ) ) {
            $response = $card->createSkills( $params['skillname'] );
            return json_encode( $response );
        } else {
            return json_encode( array( "success" => false , "error" => "Unable to Create Skill" ) );
        }
    }
 }
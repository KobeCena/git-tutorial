<?php
namespace App\Model;

use Micro\Model\AbstractModel;
use Micro\Dao\generated\classes\sql\Transaction;
use Micro\Dao\generated\classes\dto\Deck;
use Micro\Dao\generated\classes\dto\DeckCard;
use Micro\Dao\generated\classes\dao\DAOFactory;

class Deck_Model extends AbstractModel
{
    private $_userdeckCount;

    public function __construct()
    {
        $this->_userdeckCount = DAOFactory::getDecksDAO()->getRecordCount();
    }

    public function createUserDeck( $userId = 0 , $deckName = "" )
    {
        $isValid = true;
        $deckInfo = DAOFactory::getDecksDAO()->queryByDeckName( $deckName );
        if( count( $deckInfo ) > 0 ) {
            foreach( $deckInfo as $deck ) {
                if( $deck->userId == $userId ) {
                    $isValid = false;
                }
            }
        }

        if( $isValid ) {
            $transaction = new Transaction();
            $deckInstance = new Deck();
            $deckInstance->deckName = $deckName;
            $deckInstance->userId = $userId;
            DAOFactory::getDecksDAO()->insert( $deckInstance );
            $transaction->commit();
            return array( "success" => true , "result" => DAOFactory::getDecksDAO()->queryByUserId( $userId ) );
        } else {
            return array( "success" => false , "error" => "Deck already Exists" );
        }
    }

    public function getCurrentDeckCards( $deckId = 0 )
    {
        $deckCard = DAOFactory::getDeckCardsDAO()->queryByDeckId( $deckId );
        $cards = array();
        $summary = array();
        foreach( $deckCard as $dCard ) {
            $inicard = array();
            $inicard['deckCardId'] = $dCard->deckCardId;
            $inicard['deckId'] = $dCard->deckId;
            $inicard['cardId'] = $dCard->cardId;
            $cardInfo = DAOFactory::getCardsDAO()->load( $dCard->cardId );
            if( isset( $cardInfo->cardId ) ) {
                $inicard['cardInfo'] = $cardInfo;
                $summary['strength'] = ( isset( $summary['strength'] ) ) ? $summary['strength'] + $cardInfo->strength  : $cardInfo->strength ;
                $summary['defense'] = ( isset( $summary['defense'] ) ) ? $summary['defense'] + $cardInfo->defense : $cardInfo->defense ;
                $skillInfo = DAOFactory::getCardSkillsDAO()->load( $cardInfo->fkCardSkillId );
                if ( isset( $skillInfo->cardSkillId ) ) {
                    $inicard['skillInfo'] = $skillInfo;
                    if( !isset( $summary['skills'] ) ) {
                        $summary['skills'] = array();
                    }
                    if( $skillInfo->skillName != "" ) {
                        $summary['skills'][] = '* ' . $skillInfo->skillName;
                    }
                }
            }
            $faceId = ( $dCard->cardId % 82 == 0 ) ? 82 : $dCard->cardId % 82 ;
            $cardFace = DAOFactory::getCardFacesDAO()->load( $faceId );
            if( isset( $cardFace->cfaceId ) ) {
                $inicard['cardFace'] = $cardFace;
            }
            $cards[] = ( object ) $inicard;
        }
        if( isset( $summary['skills'] ) ) {
            $summary['skills'] = array_unique( $summary['skills'] );
        }
        return array( 'result' => $cards , 'summary' => (object) $summary );
    }

    public function saveCardDeckInfo( $params = array() )
    {
        if( isset( $params['deckid'] ) && isset( $params['cardid'] ) && isset( $params['deckcardid'] ) ) {
            $transaction = new Transaction();
            if( isset( $params['deckcardid'] ) && $params['deckcardid'] != "" ) {
                $carddeck = DAOFactory::getDeckCardsDAO()->load( $params['deckcardid'] );
                $carddeck->cardId = $params['cardid'];
                DAOFactory::getDeckCardsDAO()->update( $carddeck );
            } else {
                $carddeck = new DeckCard();
                $carddeck->cardId = $params['cardid'];
                $carddeck->deckId = $params['deckid'];
                DAOFactory::getDeckCardsDAO()->insert( $carddeck );
            }
            $transaction->commit();
            return $this->getCurrentDeckCards( $params['deckid'] );
        } else {
            return array( "success" => false , "error" => "Unable to Save Card to you Deck." );
        }
    }
}
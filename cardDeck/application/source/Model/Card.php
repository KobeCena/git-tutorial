<?php
namespace App\Model;

use Micro\Model\AbstractModel;
use Micro\Dao\generated\classes\sql\Transaction;
use Micro\Dao\generated\classes\dto\CardSkill;
use Micro\Dao\generated\classes\dto\Card;
use Micro\Dao\generated\classes\dao\DAOFactory;

class Card_Model extends AbstractModel
{
    private $_cardskillCount;

    public function __construct()
    {
        $this->_cardskillCount = DAOFactory::getCardSkillsDAO()->getRecordCount();
    }

    public function createCards( $count = 0 )
    {
        for( $i = $count ; $i > 0 ; $i-- ) {
            $transaction = new Transaction();
            $card = new Card();
            $card->cardname = base64_encode( microtime(true) ) . " Card";
            $card->strength = rand(1, 999);
            $card->defense = rand(1, 999);
            $card->fkCardSkillId = rand( 1 , $this->_cardskillCount );
            try{
                DAOFactory::getCardsDAO()->insert( $card );
            } catch ( \Exception $e ) {
                $i++;
            }
            $transaction->commit();
        }
    }

    public function createSkills( $skillName = "" )
    {
        $skill = DAOFactory::getCardSkillsDAO()->queryBySkillName( $skillName );
        if( count( $skill ) == 0 ) {
            $transaction = new Transaction();
            $cardskill = new CardSkill();
            $cardskill->skillName = $skillName;
            DAOFactory::getCardSkillsDAO()->insert( $cardskill );
            $transaction->commit();
            return array( "success" => true );
        } else {
            return array( "success" => false , "error" => "Skill already Exists" );
        }
    }

    public function getAllCards()
    {
        $allCards = array();
        $cards = DAOFactory::getCardsDAO()->queryAll();
        foreach( $cards as $card ) {
            $inicard = array();
            $inicard['cardId'] = $card->cardId;
            $inicard['cardname'] = $card->cardname;
            $inicard['strength'] = $card->strength;
            $inicard['defense'] = $card->defense;
            $inicard['fkCardSkillId'] = $card->fkCardSkillId;
            $skill = DAOFactory::getCardSkillsDAO()->load( $card->fkCardSkillId );
            if( isset( $skill->cardSkillId ) ) {
                $inicard['skills'] = $skill;
            }
            $faceId = ( $card->cardId % 82 == 0 ) ? 82 : $card->cardId % 82 ;
            $cardFace = DAOFactory::getCardFacesDAO()->load( $faceId );
            if( isset( $cardFace->cfaceId ) ) {
                $inicard['cardFace'] = $cardFace;
            }
            $allCards[] = (object) $inicard;
        }
        return $allCards;
    }
}
<?php
namespace App\Model;

use Micro\Model\AbstractModel;
use Micro\Dao\generated\classes\sql\Transaction;
use Micro\Dao\generated\classes\dto\CardSkill;
use Micro\Dao\generated\classes\dto\Card;
use Micro\Dao\generated\classes\dao\DAOFactory;

class Test_Model extends AbstractModel
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
        $transaction = new Transaction();
        $cardskill = new CardSkill();
        $cardskill->skillName = $skillName;
        DAOFactory::getCardSkillsDAO()->insert( $cardskill );
        $transaction->commit();
    }
}
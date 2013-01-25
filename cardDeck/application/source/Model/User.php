<?php
namespace App\Model;

use Micro\Model\AbstractModel;
use Micro\Dao\generated\classes\sql\Transaction;
use Micro\Dao\generated\classes\dto\User;
use Micro\Dao\generated\classes\dao\DAOFactory;

class User_Model extends AbstractModel
{
    private $_userCount;

    public function __construct()
    {
        $this->_userCount = DAOFactory::getUsersDAO()->getRecordCount();
    }

    public function getAllUsers( )
    {
        $users = DAOFactory::getUsersDAO()->queryAll();
        return $users;
    }

    public function createUser( $userName = "" )
    {
        $userInstance = DAOFactory::getUsersDAO()->queryByUserName( $userName );
        if( count( $userInstance ) == 0 ) {
            $transaction = new Transaction();
            $user = new User();
            $user->userName = $userName;
            DAOFactory::getUsersDAO()->insert( $user );
            $transaction->commit();
            return array( "success" => true , "result" => DAOFactory::getUsersDAO()->queryAll() );
        } else {
            return array( "success" => false , "error" => "User already Exists" );
        }
    }

    public function getUserInfo ( $userId = 0 )
    {
        $userInstance = DAOFactory::getUsersDAO()->load( $userId );
        if( isset( $userInstance->userName ) ) {
            $userCardDeck = DAOFactory::getDecksDAO()->queryByUserId($userId);
            return array( "success" => true , "result" => array( 'user' => $userInstance , 'deck' => $userCardDeck ) );
        } else {
            return array( "success" => false , "error" => "User Doesn't Exists" );
        }
    }
}
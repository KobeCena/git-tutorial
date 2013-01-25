<?php
namespace Micro\Dao\generated\classes\dao;
use 
	Micro\Dao\generated\classes\mysql\ext\CardFacesMySqlExtDAO,
	Micro\Dao\generated\classes\mysql\ext\CardSkillsMySqlExtDAO,
	Micro\Dao\generated\classes\mysql\ext\CardsMySqlExtDAO,
	Micro\Dao\generated\classes\mysql\ext\DeckCardsMySqlExtDAO,
	Micro\Dao\generated\classes\mysql\ext\DecksMySqlExtDAO,
	Micro\Dao\generated\classes\mysql\ext\UsersMySqlExtDAO ;
/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return CardFacesDAO
	 */
	public static function getCardFacesDAO(){
		return new CardFacesMySqlExtDAO();
	}

	/**
	 * @return CardSkillsDAO
	 */
	public static function getCardSkillsDAO(){
		return new CardSkillsMySqlExtDAO();
	}

	/**
	 * @return CardsDAO
	 */
	public static function getCardsDAO(){
		return new CardsMySqlExtDAO();
	}

	/**
	 * @return DeckCardsDAO
	 */
	public static function getDeckCardsDAO(){
		return new DeckCardsMySqlExtDAO();
	}

	/**
	 * @return DecksDAO
	 */
	public static function getDecksDAO(){
		return new DecksMySqlExtDAO();
	}

	/**
	 * @return UsersDAO
	 */
	public static function getUsersDAO(){
		return new UsersMySqlExtDAO();
	}


}
?>
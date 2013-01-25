<?php
namespace Micro\Dao\generated\classes\dao;
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-08-27 14:02
 */
interface DeckCardsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return DeckCards 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param deckCard primary key
 	 */

 	/**
    * Get table's record count
    *
    */
    public function getRecordCount();

	public function delete($deck_card_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DeckCards deckCard
 	 */
	public function insert($deckCard);
	
	/**
 	 * Update record in table
 	 *
 	 * @param DeckCards deckCard
 	 */
	public function update($deckCard);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDeckId($value);

	public function queryByCardId($value);


	public function deleteByDeckId($value);

	public function deleteByCardId($value);


}
?>
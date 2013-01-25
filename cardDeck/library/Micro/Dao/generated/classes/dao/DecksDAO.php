<?php
namespace Micro\Dao\generated\classes\dao;
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-08-27 14:02
 */
interface DecksDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Decks 
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
 	 * @param deck primary key
 	 */

 	/**
    * Get table's record count
    *
    */
    public function getRecordCount();

	public function delete($deck_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Decks deck
 	 */
	public function insert($deck);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Decks deck
 	 */
	public function update($deck);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUserId($value);

	public function queryByDeckName($value);


	public function deleteByUserId($value);

	public function deleteByDeckName($value);


}
?>
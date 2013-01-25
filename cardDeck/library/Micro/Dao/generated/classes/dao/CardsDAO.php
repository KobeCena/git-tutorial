<?php
namespace Micro\Dao\generated\classes\dao;
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-08-27 14:02
 */
interface CardsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Cards 
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
 	 * @param card primary key
 	 */

 	/**
    * Get table's record count
    *
    */
    public function getRecordCount();

	public function delete($card_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Cards card
 	 */
	public function insert($card);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Cards card
 	 */
	public function update($card);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCardname($value);

	public function queryByStrength($value);

	public function queryByDefense($value);

	public function queryByFkCardSkillId($value);


	public function deleteByCardname($value);

	public function deleteByStrength($value);

	public function deleteByDefense($value);

	public function deleteByFkCardSkillId($value);


}
?>
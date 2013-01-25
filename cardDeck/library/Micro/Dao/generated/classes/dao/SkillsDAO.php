<?php
namespace Micro\Dao\generated\classes\dao;
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-08-26 23:34
 */
interface SkillsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Skills 
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
 	 * @param skill primary key
 	 */

 	/**
    * Get table's record count
    *
    */
    public function getRecordCount();

	public function delete($skill_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Skills skill
 	 */
	public function insert($skill);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Skills skill
 	 */
	public function update($skill);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryBySkillName($value);


	public function deleteBySkillName($value);


}
?>
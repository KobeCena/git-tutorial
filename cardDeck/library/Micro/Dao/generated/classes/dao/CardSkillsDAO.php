<?php
namespace Micro\Dao\generated\classes\dao;
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-08-27 14:02
 */
interface CardSkillsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CardSkills 
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
 	 * @param cardSkill primary key
 	 */

 	/**
    * Get table's record count
    *
    */
    public function getRecordCount();

	public function delete($card_skill_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CardSkills cardSkill
 	 */
	public function insert($cardSkill);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CardSkills cardSkill
 	 */
	public function update($cardSkill);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryBySkillName($value);


	public function deleteBySkillName($value);


}
?>
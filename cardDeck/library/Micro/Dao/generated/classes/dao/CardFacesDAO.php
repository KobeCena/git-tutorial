<?php
namespace Micro\Dao\generated\classes\dao;
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2012-08-27 14:02
 */
interface CardFacesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CardFaces 
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
 	 * @param cardFace primary key
 	 */

 	/**
    * Get table's record count
    *
    */
    public function getRecordCount();

	public function delete($cface_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CardFaces cardFace
 	 */
	public function insert($cardFace);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CardFaces cardFace
 	 */
	public function update($cardFace);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCardFaceName($value);

	public function queryByUsage($value);


	public function deleteByCardFaceName($value);

	public function deleteByUsage($value);


}
?>
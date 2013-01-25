<?php
namespace Micro\Dao\generated\classes\mysql;
use Micro\Dao\generated\classes\sql\SqlQuery,
    Micro\Dao\generated\classes\sql\QueryExecutor,
    Micro\Dao\generated\classes\dto\Skill,
    Exception;
use Micro\Dao\generated\classes\dao\SkillsDAO;
/**
 * Class that operate on table 'skills'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-08-26 23:34
 */
class SkillsMySqlDAO implements SkillsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return SkillsMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM skills WHERE skill_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
        return $this->getRow($sqlQuery);
    }

    /**
    * Get all records from table
    */
    public function queryAll(){
        $sql = 'SELECT * FROM skills';
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }

    /**
    * Get all records from table ordered by field
    *
    * @param $orderColumn column name
    */
    public function queryAllOrderBy($orderColumn){
        $sql = 'SELECT * FROM skills ORDER BY '.$orderColumn;
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }


    /**
    * Get table's record count
    *
    */
    public function getRecordCount(){
        $sql = 'SELECT count(*) as ct FROM skills';
        $sqlQuery = new SqlQuery($sql);
        $tab = QueryExecutor::execute($sqlQuery);
        $ret = array();
        foreach( $tab as $val ) {
            $ret = $val;
        }
        return $ret;
    }

    /**
    * Delete record from table
    * @param skill primary key
    */
    public function delete($skill_id){
        $sql = 'DELETE FROM skills WHERE skill_id = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($skill_id);
        return $this->executeUpdate($sqlQuery);
    }

    /**
    * Insert record to table
    *
    * @param SkillsMySql skill
    */
    public function insert($skill){
        $sql = 'INSERT INTO skills (skill_name) VALUES (?)';
        $sqlQuery = new SqlQuery($sql);
        
		$sqlQuery->set($skill->skillName);

        $id = $this->executeInsert($sqlQuery);
        $skill->skillId = $id;
        return $id;
    }

    /**
    * Update record in table
    *
    * @param SkillsMySql skill
    */
    public function update($skill){
        $sql = 'UPDATE skills SET skill_name = ? WHERE skill_id = ?';
        $sqlQuery = new SqlQuery($sql);
        
		$sqlQuery->set($skill->skillName);

        $sqlQuery->setNumber($skill->skillId);
        return $this->executeUpdate($sqlQuery);
    }

    /**
    * Delete all rows
    */
    public function clean(){
        $sql = 'DELETE FROM skills';
        $sqlQuery = new SqlQuery($sql);
        return $this->executeUpdate($sqlQuery);
    }

	public function queryBySkillName($value){
		$sql = 'SELECT * FROM skills WHERE skill_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteBySkillName($value){
		$sql = 'DELETE FROM skills WHERE skill_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}



    /**
    * Read row
    *
    * @return SkillsMySql
    */
    protected function readRow($row){
        $skill = new Skill();
        
		$skill->skillId = $row['skill_id'];
		$skill->skillName = $row['skill_name'];

        return $skill;
    }

    protected function getList($sqlQuery){
        $tab = QueryExecutor::execute($sqlQuery);
        $ret = array();
        for($i=0;$i<count($tab);$i++){
            $ret[$i] = $this->readRow($tab[$i]);
        }
        return $ret;
    }

    /**
    * Get row
    *
    * @return SkillsMySql
    */
    protected function getRow($sqlQuery){
        $tab = QueryExecutor::execute($sqlQuery);
        if(count($tab)==0){
            return null;
        }
        return $this->readRow($tab[0]);
    }

    /**
    * Execute sql query
    */
    protected function execute($sqlQuery){
        return QueryExecutor::execute($sqlQuery);
    }


    /**
    * Execute sql query
    */
    protected function executeUpdate($sqlQuery){
        return QueryExecutor::executeUpdate($sqlQuery);
    }

    /**
    * Query for one row and one column
    */
    protected function querySingleResult($sqlQuery){
        return QueryExecutor::queryForString($sqlQuery);
    }

    /**
    * Insert row to table
    */
    protected function executeInsert($sqlQuery){
        return QueryExecutor::executeInsert($sqlQuery);
    }
}
?>
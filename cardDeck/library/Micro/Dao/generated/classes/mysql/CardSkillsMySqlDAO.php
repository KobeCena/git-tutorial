<?php
namespace Micro\Dao\generated\classes\mysql;
use Micro\Dao\generated\classes\sql\SqlQuery,
    Micro\Dao\generated\classes\sql\QueryExecutor,
    Micro\Dao\generated\classes\dto\CardSkill,
    Exception;
use Micro\Dao\generated\classes\dao\CardSkillsDAO;
/**
 * Class that operate on table 'card_skills'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-08-27 14:02
 */
class CardSkillsMySqlDAO implements CardSkillsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CardSkillsMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM card_skills WHERE card_skill_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
        return $this->getRow($sqlQuery);
    }

    /**
    * Get all records from table
    */
    public function queryAll(){
        $sql = 'SELECT * FROM card_skills';
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }

    /**
    * Get all records from table ordered by field
    *
    * @param $orderColumn column name
    */
    public function queryAllOrderBy($orderColumn){
        $sql = 'SELECT * FROM card_skills ORDER BY '.$orderColumn;
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }


    /**
    * Get table's record count
    *
    */
    public function getRecordCount(){
        $sql = 'SELECT count(*) as ct FROM card_skills';
        $sqlQuery = new SqlQuery($sql);
        $tab = QueryExecutor::execute($sqlQuery);
        $ret = array();
        foreach( $tab as $val ) {
            $ret = $val;
        }
        return ( isset( $ret['ct'] ) ) ? $ret['ct'] : 0;
    }

    /**
    * Delete record from table
    * @param cardSkill primary key
    */
    public function delete($card_skill_id){
        $sql = 'DELETE FROM card_skills WHERE card_skill_id = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($card_skill_id);
        return $this->executeUpdate($sqlQuery);
    }

    /**
    * Insert record to table
    *
    * @param CardSkillsMySql cardSkill
    */
    public function insert($cardSkill){
        $sql = 'INSERT INTO card_skills (skill_name) VALUES (?)';
        $sqlQuery = new SqlQuery($sql);
        
		$sqlQuery->set($cardSkill->skillName);

        $id = $this->executeInsert($sqlQuery);
        $cardSkill->cardSkillId = $id;
        return $id;
    }

    /**
    * Update record in table
    *
    * @param CardSkillsMySql cardSkill
    */
    public function update($cardSkill){
        $sql = 'UPDATE card_skills SET skill_name = ? WHERE card_skill_id = ?';
        $sqlQuery = new SqlQuery($sql);
        
		$sqlQuery->set($cardSkill->skillName);

        $sqlQuery->setNumber($cardSkill->cardSkillId);
        return $this->executeUpdate($sqlQuery);
    }

    /**
    * Delete all rows
    */
    public function clean(){
        $sql = 'DELETE FROM card_skills';
        $sqlQuery = new SqlQuery($sql);
        return $this->executeUpdate($sqlQuery);
    }

	public function queryBySkillName($value){
		$sql = 'SELECT * FROM card_skills WHERE skill_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteBySkillName($value){
		$sql = 'DELETE FROM card_skills WHERE skill_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}



    /**
    * Read row
    *
    * @return CardSkillsMySql
    */
    protected function readRow($row){
        $cardSkill = new CardSkill();
        
		$cardSkill->cardSkillId = $row['card_skill_id'];
		$cardSkill->skillName = $row['skill_name'];

        return $cardSkill;
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
    * @return CardSkillsMySql
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
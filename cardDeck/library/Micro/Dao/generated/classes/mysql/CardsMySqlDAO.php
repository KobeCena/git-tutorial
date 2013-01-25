<?php
namespace Micro\Dao\generated\classes\mysql;
use Micro\Dao\generated\classes\sql\SqlQuery,
    Micro\Dao\generated\classes\sql\QueryExecutor,
    Micro\Dao\generated\classes\dto\Card,
    Exception;
use Micro\Dao\generated\classes\dao\CardsDAO;
/**
 * Class that operate on table 'cards'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-08-27 14:02
 */
class CardsMySqlDAO implements CardsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CardsMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM cards WHERE card_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
        return $this->getRow($sqlQuery);
    }

    /**
    * Get all records from table
    */
    public function queryAll(){
        $sql = 'SELECT * FROM cards';
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }

    /**
    * Get all records from table ordered by field
    *
    * @param $orderColumn column name
    */
    public function queryAllOrderBy($orderColumn){
        $sql = 'SELECT * FROM cards ORDER BY '.$orderColumn;
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }


    /**
    * Get table's record count
    *
    */
    public function getRecordCount(){
        $sql = 'SELECT count(*) as ct FROM cards';
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
    * @param card primary key
    */
    public function delete($card_id){
        $sql = 'DELETE FROM cards WHERE card_id = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($card_id);
        return $this->executeUpdate($sqlQuery);
    }

    /**
    * Insert record to table
    *
    * @param CardsMySql card
    */
    public function insert($card){
        $sql = 'INSERT INTO cards (cardname, strength, defense, fk_card_skill_id) VALUES (?, ?, ?, ?)';
        $sqlQuery = new SqlQuery($sql);
        
		$sqlQuery->set($card->cardname);
		$sqlQuery->setNumber($card->strength);
		$sqlQuery->setNumber($card->defense);
		$sqlQuery->setNumber($card->fkCardSkillId);

        $id = $this->executeInsert($sqlQuery);
        $card->cardId = $id;
        return $id;
    }

    /**
    * Update record in table
    *
    * @param CardsMySql card
    */
    public function update($card){
        $sql = 'UPDATE cards SET cardname = ?, strength = ?, defense = ?, fk_card_skill_id = ? WHERE card_id = ?';
        $sqlQuery = new SqlQuery($sql);
        
		$sqlQuery->set($card->cardname);
		$sqlQuery->setNumber($card->strength);
		$sqlQuery->setNumber($card->defense);
		$sqlQuery->setNumber($card->fkCardSkillId);

        $sqlQuery->setNumber($card->cardId);
        return $this->executeUpdate($sqlQuery);
    }

    /**
    * Delete all rows
    */
    public function clean(){
        $sql = 'DELETE FROM cards';
        $sqlQuery = new SqlQuery($sql);
        return $this->executeUpdate($sqlQuery);
    }

	public function queryByCardname($value){
		$sql = 'SELECT * FROM cards WHERE cardname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStrength($value){
		$sql = 'SELECT * FROM cards WHERE strength = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDefense($value){
		$sql = 'SELECT * FROM cards WHERE defense = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFkCardSkillId($value){
		$sql = 'SELECT * FROM cards WHERE fk_card_skill_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCardname($value){
		$sql = 'DELETE FROM cards WHERE cardname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStrength($value){
		$sql = 'DELETE FROM cards WHERE strength = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDefense($value){
		$sql = 'DELETE FROM cards WHERE defense = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFkCardSkillId($value){
		$sql = 'DELETE FROM cards WHERE fk_card_skill_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}



    /**
    * Read row
    *
    * @return CardsMySql
    */
    protected function readRow($row){
        $card = new Card();
        
		$card->cardId = $row['card_id'];
		$card->cardname = $row['cardname'];
		$card->strength = $row['strength'];
		$card->defense = $row['defense'];
		$card->fkCardSkillId = $row['fk_card_skill_id'];

        return $card;
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
    * @return CardsMySql
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
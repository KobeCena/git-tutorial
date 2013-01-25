<?php
namespace Micro\Dao\generated\classes\mysql;
use Micro\Dao\generated\classes\sql\SqlQuery,
    Micro\Dao\generated\classes\sql\QueryExecutor,
    Micro\Dao\generated\classes\dto\Deck,
    Exception;
use Micro\Dao\generated\classes\dao\DecksDAO;
/**
 * Class that operate on table 'decks'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-08-27 14:02
 */
class DecksMySqlDAO implements DecksDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return DecksMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM decks WHERE deck_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
        return $this->getRow($sqlQuery);
    }

    /**
    * Get all records from table
    */
    public function queryAll(){
        $sql = 'SELECT * FROM decks';
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }

    /**
    * Get all records from table ordered by field
    *
    * @param $orderColumn column name
    */
    public function queryAllOrderBy($orderColumn){
        $sql = 'SELECT * FROM decks ORDER BY '.$orderColumn;
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }


    /**
    * Get table's record count
    *
    */
    public function getRecordCount(){
        $sql = 'SELECT count(*) as ct FROM decks';
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
    * @param deck primary key
    */
    public function delete($deck_id){
        $sql = 'DELETE FROM decks WHERE deck_id = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($deck_id);
        return $this->executeUpdate($sqlQuery);
    }

    /**
    * Insert record to table
    *
    * @param DecksMySql deck
    */
    public function insert($deck){
        $sql = 'INSERT INTO decks (user_id, deck_name) VALUES (?, ?)';
        $sqlQuery = new SqlQuery($sql);
        
		$sqlQuery->setNumber($deck->userId);
		$sqlQuery->set($deck->deckName);

        $id = $this->executeInsert($sqlQuery);
        $deck->deckId = $id;
        return $id;
    }

    /**
    * Update record in table
    *
    * @param DecksMySql deck
    */
    public function update($deck){
        $sql = 'UPDATE decks SET user_id = ?, deck_name = ? WHERE deck_id = ?';
        $sqlQuery = new SqlQuery($sql);
        
		$sqlQuery->setNumber($deck->userId);
		$sqlQuery->set($deck->deckName);

        $sqlQuery->setNumber($deck->deckId);
        return $this->executeUpdate($sqlQuery);
    }

    /**
    * Delete all rows
    */
    public function clean(){
        $sql = 'DELETE FROM decks';
        $sqlQuery = new SqlQuery($sql);
        return $this->executeUpdate($sqlQuery);
    }

	public function queryByUserId($value){
		$sql = 'SELECT * FROM decks WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDeckName($value){
		$sql = 'SELECT * FROM decks WHERE deck_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUserId($value){
		$sql = 'DELETE FROM decks WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeckName($value){
		$sql = 'DELETE FROM decks WHERE deck_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}



    /**
    * Read row
    *
    * @return DecksMySql
    */
    protected function readRow($row){
        $deck = new Deck();
        
		$deck->deckId = $row['deck_id'];
		$deck->userId = $row['user_id'];
		$deck->deckName = $row['deck_name'];

        return $deck;
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
    * @return DecksMySql
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
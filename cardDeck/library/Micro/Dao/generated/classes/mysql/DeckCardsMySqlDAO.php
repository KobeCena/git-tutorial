<?php
namespace Micro\Dao\generated\classes\mysql;
use Micro\Dao\generated\classes\sql\SqlQuery,
    Micro\Dao\generated\classes\sql\QueryExecutor,
    Micro\Dao\generated\classes\dto\DeckCard,
    Exception;
use Micro\Dao\generated\classes\dao\DeckCardsDAO;
/**
 * Class that operate on table 'deck_cards'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-08-27 14:02
 */
class DeckCardsMySqlDAO implements DeckCardsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return DeckCardsMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM deck_cards WHERE deck_card_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
        return $this->getRow($sqlQuery);
    }

    /**
    * Get all records from table
    */
    public function queryAll(){
        $sql = 'SELECT * FROM deck_cards';
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }

    /**
    * Get all records from table ordered by field
    *
    * @param $orderColumn column name
    */
    public function queryAllOrderBy($orderColumn){
        $sql = 'SELECT * FROM deck_cards ORDER BY '.$orderColumn;
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }


    /**
    * Get table's record count
    *
    */
    public function getRecordCount(){
        $sql = 'SELECT count(*) as ct FROM deck_cards';
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
    * @param deckCard primary key
    */
    public function delete($deck_card_id){
        $sql = 'DELETE FROM deck_cards WHERE deck_card_id = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($deck_card_id);
        return $this->executeUpdate($sqlQuery);
    }

    /**
    * Insert record to table
    *
    * @param DeckCardsMySql deckCard
    */
    public function insert($deckCard){
        $sql = 'INSERT INTO deck_cards (deck_id, card_id) VALUES (?, ?)';
        $sqlQuery = new SqlQuery($sql);
        
		$sqlQuery->setNumber($deckCard->deckId);
		$sqlQuery->setNumber($deckCard->cardId);

        $id = $this->executeInsert($sqlQuery);
        $deckCard->deckCardId = $id;
        return $id;
    }

    /**
    * Update record in table
    *
    * @param DeckCardsMySql deckCard
    */
    public function update($deckCard){
        $sql = 'UPDATE deck_cards SET deck_id = ?, card_id = ? WHERE deck_card_id = ?';
        $sqlQuery = new SqlQuery($sql);
        
		$sqlQuery->setNumber($deckCard->deckId);
		$sqlQuery->setNumber($deckCard->cardId);

        $sqlQuery->setNumber($deckCard->deckCardId);
        return $this->executeUpdate($sqlQuery);
    }

    /**
    * Delete all rows
    */
    public function clean(){
        $sql = 'DELETE FROM deck_cards';
        $sqlQuery = new SqlQuery($sql);
        return $this->executeUpdate($sqlQuery);
    }

	public function queryByDeckId($value){
		$sql = 'SELECT * FROM deck_cards WHERE deck_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCardId($value){
		$sql = 'SELECT * FROM deck_cards WHERE card_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDeckId($value){
		$sql = 'DELETE FROM deck_cards WHERE deck_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCardId($value){
		$sql = 'DELETE FROM deck_cards WHERE card_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}



    /**
    * Read row
    *
    * @return DeckCardsMySql
    */
    protected function readRow($row){
        $deckCard = new DeckCard();
        
		$deckCard->deckCardId = $row['deck_card_id'];
		$deckCard->deckId = $row['deck_id'];
		$deckCard->cardId = $row['card_id'];

        return $deckCard;
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
    * @return DeckCardsMySql
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
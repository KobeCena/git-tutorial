<?php
namespace Micro\Dao\generated\classes\mysql;
use Micro\Dao\generated\classes\sql\SqlQuery,
    Micro\Dao\generated\classes\sql\QueryExecutor,
    Micro\Dao\generated\classes\dto\CardFace,
    Exception;
use Micro\Dao\generated\classes\dao\CardFacesDAO;
/**
 * Class that operate on table 'card_faces'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2012-08-27 14:02
 */
class CardFacesMySqlDAO implements CardFacesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CardFacesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM card_faces WHERE cface_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
        return $this->getRow($sqlQuery);
    }

    /**
    * Get all records from table
    */
    public function queryAll(){
        $sql = 'SELECT * FROM card_faces';
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }

    /**
    * Get all records from table ordered by field
    *
    * @param $orderColumn column name
    */
    public function queryAllOrderBy($orderColumn){
        $sql = 'SELECT * FROM card_faces ORDER BY '.$orderColumn;
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }


    /**
    * Get table's record count
    *
    */
    public function getRecordCount(){
        $sql = 'SELECT count(*) as ct FROM card_faces';
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
    * @param cardFace primary key
    */
    public function delete($cface_id){
        $sql = 'DELETE FROM card_faces WHERE cface_id = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($cface_id);
        return $this->executeUpdate($sqlQuery);
    }

    /**
    * Insert record to table
    *
    * @param CardFacesMySql cardFace
    */
    public function insert($cardFace){
        $sql = 'INSERT INTO card_faces (card_face_name, usage) VALUES (?, ?)';
        $sqlQuery = new SqlQuery($sql);
        
		$sqlQuery->set($cardFace->cardFaceName);
		$sqlQuery->setNumber($cardFace->usage);

        $id = $this->executeInsert($sqlQuery);
        $cardFace->cfaceId = $id;
        return $id;
    }

    /**
    * Update record in table
    *
    * @param CardFacesMySql cardFace
    */
    public function update($cardFace){
        $sql = 'UPDATE card_faces SET card_face_name = ?, usage = ? WHERE cface_id = ?';
        $sqlQuery = new SqlQuery($sql);
        
		$sqlQuery->set($cardFace->cardFaceName);
		$sqlQuery->setNumber($cardFace->usage);

        $sqlQuery->setNumber($cardFace->cfaceId);
        return $this->executeUpdate($sqlQuery);
    }

    /**
    * Delete all rows
    */
    public function clean(){
        $sql = 'DELETE FROM card_faces';
        $sqlQuery = new SqlQuery($sql);
        return $this->executeUpdate($sqlQuery);
    }

	public function queryByCardFaceName($value){
		$sql = 'SELECT * FROM card_faces WHERE card_face_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsage($value){
		$sql = 'SELECT * FROM card_faces WHERE usage = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCardFaceName($value){
		$sql = 'DELETE FROM card_faces WHERE card_face_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsage($value){
		$sql = 'DELETE FROM card_faces WHERE usage = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}



    /**
    * Read row
    *
    * @return CardFacesMySql
    */
    protected function readRow($row){
        $cardFace = new CardFace();
        
		$cardFace->cfaceId = $row['cface_id'];
		$cardFace->cardFaceName = $row['card_face_name'];
		$cardFace->usage = $row['usage'];

        return $cardFace;
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
    * @return CardFacesMySql
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
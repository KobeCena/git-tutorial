<?php
//include all DAO files
/*require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/sql/Connection.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/sql/ConnectionFactory.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/sql/ConnectionProperty.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/sql/QueryExecutor.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/sql/Transaction.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/sql/SqlQuery.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/core/ArrayList.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/dao/DAOFactory.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/dao/CardFacesDAO.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/dto/CardFace.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/mysql/CardFacesMySqlDAO.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/mysql/ext/CardFacesMySqlExtDAO.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/dao/CardSkillsDAO.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/dto/CardSkill.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/mysql/CardSkillsMySqlDAO.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/mysql/ext/CardSkillsMySqlExtDAO.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/dao/CardsDAO.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/dto/Card.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/mysql/CardsMySqlDAO.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/mysql/ext/CardsMySqlExtDAO.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/dao/DeckCardsDAO.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/dto/DeckCard.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/mysql/DeckCardsMySqlDAO.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/mysql/ext/DeckCardsMySqlExtDAO.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/dao/DecksDAO.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/dto/Deck.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/mysql/DecksMySqlDAO.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/mysql/ext/DecksMySqlExtDAO.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/dao/UsersDAO.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/dto/User.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/mysql/UsersMySqlDAO.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/mysql/ext/UsersMySqlExtDAO.php');

*/

use Micro\Request\HttpRequest,
    Micro\Response\HttpResponse,
    Micro\Router\SimpleRouter,
    Micro\Dispatcher\MvcDispatcher,
    Micro\Database\Adapter\MysqlDriver,
    Micro\Model\AbstractDbModel,
    Micro\View\FileView,
    Micro\Controller\AbstractController,
    Micro\Exception\ConfigException,
    Micro\Config\ArrayConfig,
    Exception,
    Micro\Dao\generated\classes\core\ArrayList,
    Micro\Dao\generated\classes\sql\Connection,
    Micro\Dao\generated\classes\sql\ConnectionFactory,
    Micro\Dao\generated\classes\sql\ConnectionProperty,
    Micro\Dao\generated\classes\sql\QueryExecutor,
    Micro\Dao\generated\classes\sql\Transaction,
    Micro\Dao\generated\classes\sql\SqlQuery,
    Micro\Dao\generated\classes\core\ArrayList,
    Micro\Dao\generated\classes\dao\DAOFactory, 
	Micro\Dao\generated\classes\dao\CardFacesDAO,
	Micro\Dao\generated\classes\dto\CardFace,
	Micro\Dao\generated\classes\mysql\CardFacesMySqlDAO,
	Micro\Dao\generated\classes\mysql\ext\CardFacesMySqlExtDAO,
	Micro\Dao\generated\classes\dao\CardSkillsDAO,
	Micro\Dao\generated\classes\dto\CardSkill,
	Micro\Dao\generated\classes\mysql\CardSkillsMySqlDAO,
	Micro\Dao\generated\classes\mysql\ext\CardSkillsMySqlExtDAO,
	Micro\Dao\generated\classes\dao\CardsDAO,
	Micro\Dao\generated\classes\dto\Card,
	Micro\Dao\generated\classes\mysql\CardsMySqlDAO,
	Micro\Dao\generated\classes\mysql\ext\CardsMySqlExtDAO,
	Micro\Dao\generated\classes\dao\DeckCardsDAO,
	Micro\Dao\generated\classes\dto\DeckCard,
	Micro\Dao\generated\classes\mysql\DeckCardsMySqlDAO,
	Micro\Dao\generated\classes\mysql\ext\DeckCardsMySqlExtDAO,
	Micro\Dao\generated\classes\dao\DecksDAO,
	Micro\Dao\generated\classes\dto\Deck,
	Micro\Dao\generated\classes\mysql\DecksMySqlDAO,
	Micro\Dao\generated\classes\mysql\ext\DecksMySqlExtDAO,
	Micro\Dao\generated\classes\dao\UsersDAO,
	Micro\Dao\generated\classes\dto\User,
	Micro\Dao\generated\classes\mysql\UsersMySqlDAO,
	Micro\Dao\generated\classes\mysql\ext\UsersMySqlExtDAO ;
?>

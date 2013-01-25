<?php
//include all DAO files
/*require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/sql/Connection.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/sql/ConnectionFactory.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/sql/ConnectionProperty.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/sql/QueryExecutor.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/sql/Transaction.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/sql/SqlQuery.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/core/ArrayList.php');
require_once(APPLICATION_PATH . '/../library/Micro/Dao/generated/classes/dao/DAOFactory.php');${include}
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
    Micro\Dao\generated\classes\dao\DAOFactory, ${use} ;
?>

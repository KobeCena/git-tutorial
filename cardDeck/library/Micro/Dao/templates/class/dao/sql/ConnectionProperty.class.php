<?php
/**
 * Connection properties
 *
 * @author: http://phpdao.com
 * @date: 27.11.2007
 */
class ConnectionProperty
{
    // If config file doesn't exists or contains wrong values makes use of this static variables
    private static $host = 'localhost';
    private static $user = 'root';
    private static $password = '';
    private static $database = 'carddeck';

    public static function getHost()
    {
        if( file_exists( APPLICATION_PATH . "/config/" . APPLICATION_ENV . ".php" ) ) {
            $conf = include APPLICATION_PATH . "/config/" . APPLICATION_ENV . ".php";
            if( isset ( $conf['database']['dsnParams']['host'] ) ) {
                return $conf['database']['dsnParams']['host'];
            }
        }
        return ConnectionProperty::$host;
    }

    public static function getUser()
    {
        if( file_exists( APPLICATION_PATH . "/config/" . APPLICATION_ENV . ".php" ) ) {
            $conf = include APPLICATION_PATH . "/config/" . APPLICATION_ENV . ".php";
            if( isset ( $conf['database']['username'] ) ) {
                return $conf['database']['username'];
            }
        }
        return ConnectionProperty::$user;
    }

    public static function getPassword()
    {
        if( file_exists( APPLICATION_PATH . "/config/" . APPLICATION_ENV . ".php" ) ) {
            $conf = include APPLICATION_PATH . "/config/" . APPLICATION_ENV . ".php";
            if( isset ( $conf['database']['password'] ) ) {
                return $conf['database']['password'];
            }
        }
        return ConnectionProperty::$password;
    }

    public static function getDatabase()
    {
        if( file_exists( APPLICATION_PATH . "/config/" . APPLICATION_ENV . ".php" ) ) {
            $conf = include APPLICATION_PATH . "/config/" . APPLICATION_ENV . ".php";
            if( isset ( $conf['database']['dsnParams']['dbname'] ) ) {
                return $conf['database']['dsnParams']['dbname'];
            }
        }
        return ConnectionProperty::$database;
    }
}

?>

<?php

namespace Micro\Database\Adapter;

class MysqlDriver extends AbstractAdapter
{
    /**
     * Creates a dsn string from the given parameters
     *
     * @param  array $params
     * @return string
     */
    protected function _createDsn(array $params)
    {
        $dsn = 'mysql:';

        if (isset($params['host'])) {
            $dsn .= 'host=' . $params['host'] . ';';
        }

        if (isset($params['port'])) {
            $dsn .= 'port=' . $params['port'] . ';';
        }

        if (isset($params['dbname'])) {
            $dsn .= 'dbname=' . $params['dbname'] . ';';
        }

        if (isset($params['unix_socket'])) {
            $dsn .= 'unix_socket=' . $params['unix_socket'] . ';';
        }

        return $dsn;
    }
}
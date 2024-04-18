<?php

namespace App\Repositories;

/**
 * Repository Queries
 * @abstract
 */
abstract class RepoQueries
{
    /**
     * @param string $sql
     * @param array $params
     * @return array|bool
     */
    protected function getRowParams(string $sql, array $params)
    {
        global $dbconn;

        $result = pg_query_params($dbconn, $sql, $params);
        $row = pg_fetch_assoc($result);

        return $row;
    }

    /**
     * @param string $sql
     * @return array
     */
    protected function getRows(string $sql)
    {
        global $dbconn;

        $result = pg_query($dbconn, $sql);
        $rows = pg_fetch_all($result);

        return $rows;
    }

    /**
     * @param string $sql
     * @param array $args
     * @return array
     */
    protected function getRowsParams(string $sql, array $params)
    {
        global $dbconn;

        $args = [
            $params["limit"]
        ];

        print_r($args);

        $result = pg_query_params($dbconn, $sql, $args);
        $rows = pg_fetch_all($result);

        return $rows;
    }

    /**
     * @param string $sql
     * @param array $params
     * @return bool
     */
    protected function doQueryParams(string $sql, array $params)
    {
        global $dbconn;

        $result = pg_query_params($dbconn, $sql, $params);

        return ($result ? true : false);
    }
}

?>
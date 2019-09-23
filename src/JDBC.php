<?php
/**
 * Created by PhpStorm.
 * User: vernerd
 * Date: 2019-09-23
 * Time: 19:38
 */

namespace DanielWerner\LaravelSchemaCrawler;


class JDBC
{
    public static function url($databaseDriver, $server, $port = null): string
    {
        $url = '';

        switch($databaseDriver){
            case 'mysql':
                $url = 'jdbc:mysql://%s:%d?serverTimezone=UTC';
                break;
            case 'pgsql':
                $url = 'jdbc:postgresql://%s:%d?serverTimezone=UTC';
                break;
            case 'sqlsrv':
                $url = 'jdbc:sqlserver://%s:%d?serverTimezone=UTC';
                break;

        }

        $url = sprintf($url, $server, $port);

        return $url;
    }
}
/*
db2            IBM DB2
 hsqldb         HyperSQL DataBase
 mysql          MySQL
 offline        SchemaCrawler Offline Catalog Snapshot
 oracle         Oracle
 postgresql     PostgreSQL
 sqlite         SQLite
 sqlserver      Microsoft SQL Server
*/
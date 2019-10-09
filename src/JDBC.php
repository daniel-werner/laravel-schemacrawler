<?php
/**
 * Created by PhpStorm.
 * User: vernerd
 * Date: 2019-09-23
 * Time: 19:38.
 */

namespace DanielWerner\LaravelSchemaCrawler;

class JDBC
{
    /**
     * @param string $databaseDriver
     * @param string $server
     * @param string $port
     * @return string
     */
    public static function url(string $databaseDriver, string $server, string $port): string
    {
        $url = '';

        switch ($databaseDriver) {
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

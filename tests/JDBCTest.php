<?php
/**
 * Created by PhpStorm.
 * User: vernerd
 * Date: 2019-09-23
 * Time: 19:40
 */

namespace DanielWerner\LaravelSchemaCrawler\Tests;

use DanielWerner\LaravelSchemaCrawler\JDBC;

class JDBCTest extends TestCase
{

    /**
     * @test
     */
    public function mysql_url()
    {
        $url = JDBC::url('mysql', '127.0.0.1', 3306);
        $expectedUrl = 'jdbc:mysql://127.0.0.1:3306?serverTimezone=UTC';

        $this->assertEquals($expectedUrl, $url);
    }

    /**
     * @test
     */
    public function postgres_url()
    {
        $url = JDBC::url('pgsql', '127.0.0.1', 5740);
        $expectedUrl = 'jdbc:postgresql://127.0.0.1:5740?serverTimezone=UTC';

        $this->assertEquals($expectedUrl, $url);
    }

    /**
     * @test
     */
    public function sql_server_url()
    {
        $url = JDBC::url('sqlsrv', '127.0.0.1', 1433);
        $expectedUrl = 'jdbc:sqlserver://127.0.0.1:1433?serverTimezone=UTC';

        $this->assertEquals($expectedUrl, $url);
    }
}

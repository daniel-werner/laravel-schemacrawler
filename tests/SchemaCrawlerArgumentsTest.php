<?php
/**
 * Created by PhpStorm.
 * User: vernerd
 * Date: 2019-09-23
 * Time: 17:48
 */

namespace DanielWerner\LaravelSchemaCrawler\Tests;

use DanielWerner\LaravelSchemaCrawler\SchemaCrawlerArguments;

class SchemaCrawlerArgumentsTest extends TestCase
{
    /**
     * @test
     */
    public function test_arguments_to_array()
    {
        $crawlerArguments = new SchemaCrawlerArguments(
            'test.pdf',
            'pdf',
            'default',
            'standard',
            'schema'
        );

        $arguments = $crawlerArguments->toArray();

        $connection = config('database.' . ($connection ?? config('laravel-schemacrawler.connection')));

        $expectedArguments = [
            '--user', config('database.connections.' . $connection . '.username'),
            '--password', config('database.connections.' . $connection . '.password'),
            '--info-level', 'standard',
            '--command', 'schema',
            '--url', 'jdbc:mysql://127.0.0.1:3306?serverTimezone=UTC',
            '--output-file', storage_path('app/test.pdf'),
            '--output-format', 'pdf',
            '--schemas', 'crawl_test'
        ];

        $this->assertEquals($expectedArguments, $arguments);
    }
}

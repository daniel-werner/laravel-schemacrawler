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

        $expectedArguments = [
            '--user', 'root',
            '--password', '123',
            '--info-level', 'standard',
            '--command', 'schema',
            '--url', 'jdbc:mysql://127.0.0.1:3306?serverTimezone=UTC',
            '--output-file', 'test.pdf',
            '--output-format', 'pdf',
            '--schemas', 'crawl_test'
        ];

        $this->assertEquals($expectedArguments, $arguments);
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: vernerd
 * Date: 2019-09-13
 * Time: 19:41.
 */

namespace DanielWerner\LaravelSchemaCrawler\Tests;

use DanielWerner\LaravelSchemaCrawler\SchemaCrawler;
use DanielWerner\LaravelSchemaCrawler\LaravelSchemaCrawlerServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [LaravelSchemaCrawlerServiceProvider::class];
    }

    /**
     * @return array
     */
    protected function getPackageAliases($app): array
    {
        return [
            'SchemaCrawler' => SchemaCrawler::class,
        ];
    }

    /**
     * Prepares the DB before running tests
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        config(['database.default' => 'mysql']);
        config([
            'database.connections.mysql' => [
                'driver' => 'mysql',
                'host' => '127.0.0.1',
                'port' => '3306',
                'database' => 'crawl_test',
                'username' => 'homestead',
                'password' => 'secret',
                'unix_socket' => '',
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix' => '',
                'strict' => true,
                'engine' => null,
            ],
        ]);

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->artisan('migrate')->run();
    }
}

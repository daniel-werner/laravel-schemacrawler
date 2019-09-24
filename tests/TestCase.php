<?php
/**
 * Created by PhpStorm.
 * User: vernerd
 * Date: 2019-09-13
 * Time: 19:41
 */

namespace DanielWerner\LaravelSchemaCrawler\Tests;


use DanielWerner\LaravelSchemaCrawler\SchemaCrawler;
use DanielWerner\LaravelSchemaCrawler\LaravelSchemaCrawlerServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [LaravelSchemaCrawlerServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'SchemaCrawler' => SchemaCrawler::class
        ];
    }

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
                'username' => 'root',
                'password' => '123',
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

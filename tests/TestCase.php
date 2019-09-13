<?php
/**
 * Created by PhpStorm.
 * User: vernerd
 * Date: 2019-09-13
 * Time: 19:41
 */

namespace DanielWerner\LaravelSchemaCrawler\Tests;


use DanielWerner\LaravelSchemaCrawler\LaravelSchemaCrawler;
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
            'SchemaCrawler' => LaravelSchemaCrawler::class
        ];
    }
}

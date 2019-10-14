<?php

namespace DanielWerner\LaravelSchemaCrawler\Facades;

use Illuminate\Support\Facades\Facade;
use DanielWerner\LaravelSchemaCrawler\SchemaCrawlerArguments;

/**
 * @see \DanielWerner\LaravelSchemacrawler\LaravelSchemaCrawler
 * @static crawl(?SchemaCrawlerArguments $arguments = null)
 */
class SchemaCrawler extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-schemacrawler';
    }
}

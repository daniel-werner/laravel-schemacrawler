<?php

namespace DanielWerner\LaravelSchemaCrawler\Facades;

use DanielWerner\LaravelSchemaCrawler\SchemaCrawlerArguments;
use Illuminate\Support\Facades\Facade;

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

<?php

namespace DanielWerner\LaravelSchemaCrawler\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \DanielWerner\LaravelSchemacrawler\LaravelSchemaCrawler
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

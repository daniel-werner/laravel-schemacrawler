<?php

namespace DanielWerner\LaravelSchemaCrawler;

use Illuminate\Support\Facades\Facade;

/**
 * @see \DanielWerner\LaravelSchemacrawler\Skeleton\SkeletonClass
 */
class LaravelSchemaCrawlerFacade extends Facade
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

<?php

namespace DanielWerner\LaravelSchemaCrawler\Tests;

use DanielWerner\LaravelSchemaCrawler\LaravelSchemaCrawlerFacade;

class ExampleTest extends TestCase
{
    /** @test */
    public function facace_is_working()
    {
        $this->assertTrue( LaravelSchemaCrawlerFacade::test());
    }
}

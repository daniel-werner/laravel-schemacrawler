<?php

namespace DanielWerner\LaravelSchemaCrawler\Tests;

use DanielWerner\LaravelSchemaCrawler\LaravelSchemaCrawlerFacade;

class SchemaCrawlerTest extends TestCase
{
    /** @test */
    public function schema_crawl_test()
    {
        LaravelSchemaCrawlerFacade::crawl('test.pdf');

        $this->assertTrue(file_exists('test.pdf'));
    }
}

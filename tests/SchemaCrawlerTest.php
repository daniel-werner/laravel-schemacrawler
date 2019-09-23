<?php

namespace DanielWerner\LaravelSchemaCrawler\Tests;

use DanielWerner\LaravelSchemaCrawler\LaravelSchemaCrawlerFacade;
use DanielWerner\LaravelSchemaCrawler\SchemaCrawlerArguments;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SchemaCrawlerTest extends TestCase
{
    use RefreshDatabase;

    protected function tearDown(): void
    {
        parent::tearDown();

        if (file_exists('test.pdf')) {
            unlink('test.pdf');
        }

        if (file_exists('schema.pdf')) {
            unlink('schema.pdf');
        }
    }


    /** @test */
    public function schema_crawl_test()
    {
        LaravelSchemaCrawlerFacade::crawl();
        $this->assertTrue(file_exists('schema.pdf'));
    }

    /** @test */
    public function schema_crawl_test_with_arguments()
    {
        $crawlerArguments = new SchemaCrawlerArguments('test.pdf');

        LaravelSchemaCrawlerFacade::crawl($crawlerArguments);

        $this->assertTrue(file_exists('test.pdf'));
    }
}

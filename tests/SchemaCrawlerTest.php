<?php

namespace DanielWerner\LaravelSchemaCrawler\Tests;

use DanielWerner\LaravelSchemaCrawler\LaravelSchemaCrawlerFacade;
use DanielWerner\LaravelSchemaCrawler\SchemaCrawlerArguments;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SchemaCrawlerTest extends TestCase
{
    protected $outputPath;

    public function setUp(): void
    {
        parent::setUp();
        $this->outputPath = __DIR__ . '/output';
    }

    use RefreshDatabase;


    protected function tearDown(): void
    {
        parent::tearDown();
    }


    /** @test */
    public function schema_crawl_test()
    {
        LaravelSchemaCrawlerFacade::crawl();
        $this->assertTrue(file_exists('schema.pdf'));
        unlink('schema.pdf');
    }

    /** @test */
    public function schema_crawl_test_with_arguments_pdf_output()
    {
        $fileName = $this->outputPath . '/test.pdf';
        $crawlerArguments = new SchemaCrawlerArguments($fileName);

        LaravelSchemaCrawlerFacade::crawl($crawlerArguments);

        $this->assertTrue(file_exists($fileName));
        unlink($fileName);
    }

    /** @test */
    public function schema_crawl_test_with_arguments_png_output()
    {
        $fileName = $this->outputPath . '/test.png';
        $crawlerArguments = new SchemaCrawlerArguments($fileName, 'png');
        LaravelSchemaCrawlerFacade::crawl($crawlerArguments);

        $this->assertTrue(file_exists($fileName));
        unlink($fileName);
    }

    /** @test */
    public function schema_crawl_test_with_arguments_html_output()
    {
        $fileName = $this->outputPath . '/test.html';
        $crawlerArguments = new SchemaCrawlerArguments($fileName, 'html');
        LaravelSchemaCrawlerFacade::crawl($crawlerArguments);

        $this->assertTrue(file_exists($fileName));
        unlink($fileName);
    }


}

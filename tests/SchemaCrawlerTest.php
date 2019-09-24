<?php

namespace DanielWerner\LaravelSchemaCrawler\Tests;

use DanielWerner\LaravelSchemaCrawler\Facades\SchemaCrawler;
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
        $file = SchemaCrawler::crawl();
        $this->assertTrue(file_exists($file));
        unlink($file);
    }

    /** @test */
    public function schema_crawl_test_with_arguments_pdf_output()
    {
        $fileName = $this->outputPath . '/test.pdf';
        $crawlerArguments = new SchemaCrawlerArguments($fileName);

        SchemaCrawler::crawl($crawlerArguments);

        $this->assertTrue(file_exists($fileName));
        unlink($fileName);
    }

    /** @test */
    public function schema_crawl_test_with_arguments_png_output()
    {
        $fileName = $this->outputPath . '/test.png';
        $crawlerArguments = new SchemaCrawlerArguments($fileName, 'png');
        SchemaCrawler::crawl($crawlerArguments);

        $this->assertTrue(file_exists($fileName));
        unlink($fileName);
    }

    /** @test */
    public function schema_crawl_test_with_arguments_html_output()
    {
        $fileName = $this->outputPath . '/test.html';
        $crawlerArguments = new SchemaCrawlerArguments($fileName, 'html');
        SchemaCrawler::crawl($crawlerArguments);

        $this->assertTrue(file_exists($fileName));
        unlink($fileName);
    }

    /** @test */
    public function schema_crawl_test_with_arguments_svg_output()
    {
        $fileName = $this->outputPath . '/test.html';
        $crawlerArguments = new SchemaCrawlerArguments($fileName, 'svg');
        SchemaCrawler::crawl($crawlerArguments);

        $this->assertTrue(file_exists($fileName));
        unlink($fileName);
    }


}

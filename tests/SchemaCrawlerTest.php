<?php

namespace DanielWerner\LaravelSchemaCrawler\Tests;

use DanielWerner\LaravelSchemaCrawler\Facades\SchemaCrawler;
use DanielWerner\LaravelSchemaCrawler\SchemaCrawlerArguments;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\Process\Exception\ProcessFailedException;

class SchemaCrawlerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

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
        $fileName = 'test.pdf';
        $crawlerArguments = new SchemaCrawlerArguments($fileName);

        $file = SchemaCrawler::crawl($crawlerArguments);

        $this->assertTrue(file_exists($file));
        unlink($file);
    }

    /** @test */
    public function schema_crawl_test_with_arguments_png_output()
    {
        $fileName = 'test.png';
        $crawlerArguments = new SchemaCrawlerArguments($fileName, 'png');
        $file = SchemaCrawler::crawl($crawlerArguments);

        $this->assertTrue(file_exists($file));
        unlink($file);
    }

    /** @test */
    public function schema_crawl_test_with_arguments_html_output()
    {
        $fileName = 'test.html';
        $crawlerArguments = new SchemaCrawlerArguments($fileName, 'html');
        $file = SchemaCrawler::crawl($crawlerArguments);

        $this->assertTrue(file_exists($file));
        unlink($file);
    }

    /** @test */
    public function schema_crawl_test_with_arguments_svg_output()
    {
        $fileName = 'test.html';
        $crawlerArguments = new SchemaCrawlerArguments($fileName, 'svg');
        $file = SchemaCrawler::crawl($crawlerArguments);

        $this->assertTrue(file_exists($file));
        unlink($file);
    }

    /** @test */
    public function schema_crawl_test_invalid_crawler_executable()
    {
        config(['laravel-schemacrawler.schemacrawler_executable' => 'non_existing']);

        $this->expectException(ProcessFailedException::class);
        SchemaCrawler::crawl();

    }


}

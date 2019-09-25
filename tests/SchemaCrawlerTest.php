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

    /**
     * @test
     * @dataProvider formatDataProvider
     */
    public function schema_crawl_test_with_format_arguments($fileName, $outputFormat)
    {
        $crawlerArguments = new SchemaCrawlerArguments($fileName, $outputFormat);

        $file = SchemaCrawler::crawl($crawlerArguments);

        $this->assertTrue(file_exists($file));
        unlink($file);
    }

    public function formatDataProvider()
    {
        return [
            ['test.pdf', 'pdf'],
            ['test.png', 'png'],
            ['test.html', 'html'],
            ['test.html', 'svg']
        ];
    }

    /** @test */
    public function schema_crawl_test_invalid_crawler_executable()
    {
        config(['laravel-schemacrawler.schemacrawler_executable' => 'non_existing']);

        $this->expectException(ProcessFailedException::class);
        SchemaCrawler::crawl();

    }


}

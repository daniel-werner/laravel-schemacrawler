<?php

namespace DanielWerner\LaravelSchemaCrawler\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use DanielWerner\LaravelSchemaCrawler\Facades\SchemaCrawler;
use DanielWerner\LaravelSchemaCrawler\SchemaCrawlerArguments;
use Symfony\Component\Process\Exception\ProcessFailedException;

class SchemaCrawlerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @return void
     */
    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     * @return void
     */
    public function schema_crawl_test(): void
    {
        $file = SchemaCrawler::crawl();
        $this->assertTrue(file_exists($file));
        unlink($file);
    }

    /**
     * @test
     * @dataProvider formatDataProvider
     * @param string|null $fileName
     * @param string|null $outputFormat
     */
    public function schema_crawl_test_with_format_arguments($fileName, $outputFormat): void
    {
        $crawlerArguments = new SchemaCrawlerArguments($fileName, $outputFormat);

        $file = SchemaCrawler::crawl($crawlerArguments);

        $this->assertTrue(file_exists($file));
        unlink($file);
    }

    /**
     * @return array
     */
    public function formatDataProvider(): array
    {
        return [
            ['test.pdf', 'pdf'],
            ['test.png', 'png'],
            ['test.html', 'html'],
            ['test.html', 'svg'],
        ];
    }

    /**
     * @test
     * @return void
     */
    public function schema_crawl_test_invalid_crawler_executable(): void
    {
        config(['laravel-schemacrawler.schemacrawler_executable' => 'non_existing']);

        $this->expectException(ProcessFailedException::class);
        SchemaCrawler::crawl();
    }
}

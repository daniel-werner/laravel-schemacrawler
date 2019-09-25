<?php
/**
 * Created by PhpStorm.
 * User: vernerd
 * Date: 2019-09-24
 * Time: 22:42
 */

namespace DanielWerner\LaravelSchemaCrawler\Tests\Console\Commands;

use DanielWerner\LaravelSchemaCrawler\Tests\TestCase;

class SchemaCrawlerCommandTest extends TestCase
{
    /**
     * @test
     */
    public function get_schema_without_arguments()
    {
        $expectedFile = config('laravel-schemacrawler.output_base_path') . '/' . config('laravel-schemacrawler.output_file');

        $this->artisan('schema:generate')
            ->expectsOutput('Generated diagram to ' . $expectedFile)
            ->assertExitCode(0);

        $this->assertTrue(file_exists($expectedFile));
    }

    /**
     * @test
     * @dataProvider formatDataProvider
     */
    public function get_schema_various_format($outputFile, $outputFormat)
    {

        $expectedFile = config('laravel-schemacrawler.output_base_path') . '/' . $outputFile;

        $this->artisan('schema:generate', ['--output-format' => $outputFormat, '--output-file' => $outputFile])
            ->expectsOutput('Generated diagram to ' . $expectedFile)
            ->assertExitCode(0);

        $this->assertTrue(file_exists($expectedFile));
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
}

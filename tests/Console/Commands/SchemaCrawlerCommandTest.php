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
     */
    public function get_schema_png_format()
    {

        $expectedFile = config('laravel-schemacrawler.output_base_path') . '/schema.png';

        $this->artisan('schema:generate', ['--output-format' => 'png', '--output-file' => 'schema.png'])
            ->expectsOutput('Generated diagram to ' . $expectedFile)
            ->assertExitCode(0);

        $this->assertTrue(file_exists($expectedFile));
    }

    /**
     * @test
     */
    public function get_schema_html_format()
    {

        $expectedFile = config('laravel-schemacrawler.output_base_path') . '/schema.html';

        $this->artisan('schema:generate', ['--output-format' => 'html', '--output-file' => 'schema.html'])
            ->expectsOutput('Generated diagram to ' . $expectedFile)
            ->assertExitCode(0);

        $this->assertTrue(file_exists($expectedFile));
    }

    /**
     * @test
     */
    public function get_schema_svg_format()
    {

        $expectedFile = config('laravel-schemacrawler.output_base_path') . '/schema.html';

        $this->artisan('schema:generate', ['--output-format' => 'svg', '--output-file' => 'schema.html'])
            ->expectsOutput('Generated diagram to ' . $expectedFile)
            ->assertExitCode(0);

        $this->assertTrue(file_exists($expectedFile));
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: vernerd
 * Date: 2019-09-24
 * Time: 20:10.
 */

namespace DanielWerner\LaravelSchemaCrawler\Tests\Http\Controllers;

use DanielWerner\LaravelSchemaCrawler\Tests\TestCase;

class SchemaControllerTest extends TestCase
{
    /**
     * @test
     */
    public function get_schema_without_arguments()
    {
        $this->get(route('schema.show'))
            ->assertStatus(200)
            ->assertHeader('content-type', 'application/pdf');
    }

    /**
     * @test
     * @dataProvider formatDataProvider
     */
    public function get_schema_various_formats($outputFile, $outputFormat, $expectedContentType)
    {
        $params = [
            'output_file' => $outputFile,
            'output_format' => $outputFormat,
        ];

        $this->get(route('schema.show', $params))
            ->assertStatus(200)
            ->assertHeader('content-type', $expectedContentType);
    }

    public function formatDataProvider()
    {
        return [
            ['test.pdf', 'pdf', 'application/pdf'],
            ['test.png', 'png', 'image/png'],
            ['test.html', 'html', 'text/html'],
            ['test.html', 'svg', 'image/svg+xml'],
        ];
    }
}

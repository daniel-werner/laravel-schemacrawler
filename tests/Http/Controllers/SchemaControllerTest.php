<?php
/**
 * Created by PhpStorm.
 * User: vernerd
 * Date: 2019-09-24
 * Time: 20:10
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
     */
    public function get_schema_png_format()
    {
        $params = [
            'output_file' => 'schema.png',
            'output_format' => 'png'
        ];

        $this->get(route('schema.show', $params) )
            ->assertStatus(200)
            ->assertHeader('content-type', 'image/png');
    }
}

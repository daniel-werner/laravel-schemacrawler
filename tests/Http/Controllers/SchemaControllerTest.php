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
        $response = $this->get(route('schema.show'));
        $response->assertStatus(200);
        $response->assertHeader('ContentType', 'application/pdf');
    }
}

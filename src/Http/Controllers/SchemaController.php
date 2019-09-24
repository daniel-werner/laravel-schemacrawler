<?php
/**
 * Created by PhpStorm.
 * User: vernerd
 * Date: 2019-09-24
 * Time: 20:07
 */

namespace DanielWerner\LaravelSchemaCrawler\Http\Controllers;


use DanielWerner\LaravelSchemaCrawler\Facades\SchemaCrawler;
use DanielWerner\LaravelSchemaCrawler\SchemaCrawlerArguments;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SchemaController extends Controller
{
    private function createArgumentsFromRequest(Request $request) : SchemaCrawlerArguments
    {
        return new SchemaCrawlerArguments(
            $request->output_file,
            $request->output_format,
            $request->connection,
            $request->info_level,
            $request->command
        );
    }

    public function show(Request $request)
    {
        $file = SchemaCrawler::crawl($this->createArgumentsFromRequest($request));

        return response()->file($file);
    }
}
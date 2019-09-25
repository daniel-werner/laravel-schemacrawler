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
use Symfony\Component\Process\Process;

class SchemaController extends Controller
{
    private function createArgumentsFromRequest(Request $request) : SchemaCrawlerArguments
    {
        return new SchemaCrawlerArguments(
            $request->output_file,
            'scdot',
            $request->connection,
            $request->info_level,
            $request->command
        );
    }

    public function show(Request $request)
    {
        $outputFormat = $request->output_format ?? config('laravel-schemacrawler.output_format');

        $file = SchemaCrawler::crawl($this->createArgumentsFromRequest($request));

        // Workaround, the schemacrawler cannot call the dot, when called from php,
        // need to manually convert the file from scdot format
        // @see: https://github.com/schemacrawler/SchemaCrawler/issues/179
        $process = new Process(['dot','-T',$outputFormat,$file,'-o',$file]);
        $process->run();

        return response()->file($file);
    }
}
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
    private function createArgumentsFromRequest(Request $request): SchemaCrawlerArguments
    {
        // If the requested output format is not html, first generate scdot, and convert it manually afterwards
        return new SchemaCrawlerArguments(
            $request->output_file,
            $request->output_format !== 'html' ? 'scdot' : $request->output_format,
            $request->connection,
            $request->info_level,
            $request->command
        );
    }

    public function show(Request $request)
    {
        $outputFormat = $request->output_format ?? config('laravel-schemacrawler.output_format');
        $file = SchemaCrawler::crawl($this->createArgumentsFromRequest($request));
        $file = $this->convertOutputFile($outputFormat, $file);

        return response()->file($file)->deleteFileAfterSend();
    }

    /**
     * @param $outputFormat
     * @param $file
     * @return string
     */
    private function convertOutputFile($outputFormat, $file): string
    {
        // Workaround, the schemacrawler cannot call the dot, when called from php using Valet.
        // It is necessary to generate the schema in scdot format, and manually convert the to the output format
        // @see: https://github.com/schemacrawler/SchemaCrawler/issues/179
        $process = new Process(['dot', '-T', $outputFormat, $file, '-o', $file]);
        $process->run();

        return $file;
    }
}
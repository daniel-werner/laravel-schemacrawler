<?php

namespace DanielWerner\LaravelSchemaCrawler;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class LaravelSchemaCrawler
{
    /**
     * @param SchemaCrawlerArguments|null $arguments
     * @return string|null
     */
    public function crawl(?SchemaCrawlerArguments $arguments = null) : ?string
    {
        if ($arguments === null) {
            $arguments = new SchemaCrawlerArguments();
        }

        $crawlerArgumentsArray = $arguments->toArray();
        $command = __DIR__.'/../bin/schemacrawler/'.config('laravel-schemacrawler.schemacrawler_executable');
        array_unshift($crawlerArgumentsArray, $command);

        $process = new Process($crawlerArgumentsArray);
        $process->run();

        if ($process->isSuccessful()) {
            return $arguments->getOutputFile();
        }

        throw new ProcessFailedException($process);
    }
}

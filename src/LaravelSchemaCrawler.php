<?php

namespace DanielWerner\LaravelSchemaCrawler;

use Symfony\Component\Process\Process;

class LaravelSchemaCrawler
{
    public function crawl(?SchemaCrawlerArguments $arguments = null)
    {
        if ($arguments === null) {
            $arguments = new SchemaCrawlerArguments();
        }

        $crawlerArgumentsArray = $arguments->toArray();
        array_unshift($crawlerArgumentsArray, './bin/schemacrawler/schemacrawler.sh');

        $process = new Process($crawlerArgumentsArray);
        $process->run();
    }
}

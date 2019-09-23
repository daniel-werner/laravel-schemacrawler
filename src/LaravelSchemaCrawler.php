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
        $command = './bin/schemacrawler/schemacrawler.sh';
        array_unshift($crawlerArgumentsArray, $command);

        $process = new Process($crawlerArgumentsArray);
        $process->run();
    }
}

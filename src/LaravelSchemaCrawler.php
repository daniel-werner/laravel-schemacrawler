<?php

namespace DanielWerner\LaravelSchemaCrawler;

class LaravelSchemaCrawler
{
    public function crawl($fileName)
    {

        $dbDefault = config('database.default');
        $dbConnection = config('database.' . $dbDefault);

        $url = sprintf('jdbc:%1$s://%2$s:%3$s?serverTimezone=UTC',
            $dbConnection['driver'],
            $dbConnection['host'],
            $dbConnection['port']);

        $command = sprintf(
            './bin/schemacrawler/schemacrawler.sh --user=%4$s --password=%5$s --info-level=standard --command=schema --url="%2$s" --output-file="%1$s" --output-format=pdf --schemas=%3$s',
            $fileName,
            $url,
            $dbConnection['database'],
            $dbConnection['username'],
            $dbConnection['password']
        );

        exec($command);
    }
}

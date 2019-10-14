<?php
/**
 * Created by PhpStorm.
 * User: vernerd
 * Date: 2019-09-23
 * Time: 17:44.
 */

namespace DanielWerner\LaravelSchemaCrawler;

use Illuminate\Support\Str;

class SchemaCrawlerArguments
{
    protected $user;

    protected $password;

    protected $infoLevel;

    protected $command;

    protected $url;

    protected $outputFile;

    protected $outputFormat;

    protected $schemas;

    /**
     * SchemaCrawlerArguments constructor.
     * @param string|null $outputFile
     * @param string|null $outputFormat
     * @param string|null $connection
     * @param string|null $infoLevel
     * @param string|null $command
     */
    public function __construct(
        ?string $outputFile = null,
        ?string $outputFormat = null,
        ?string $connection = null,
        ?string $infoLevel = null,
        ?string $command = null
    ) {
        $connection = config('database.'.($connection ?? config('laravel-schemacrawler.connection')));

        $this->user = config('database.connections.'.$connection.'.username');
        $this->password = config('database.connections.'.$connection.'.password');
        $this->infoLevel = $infoLevel ?? config('laravel-schemacrawler.info_level');
        $this->command = $command ?? 'schema';

        $databaseDriver = config('database.connections.'.$connection.'.driver');
        $host = config('database.connections.'.$connection.'.host');
        $port = config('database.connections.'.$connection.'.port');
        $this->url = JDBC::url($databaseDriver, $host, $port);

        $this->outputFile = config('laravel-schemacrawler.output_base_path').DIRECTORY_SEPARATOR.
            ($outputFile ?? config('laravel-schemacrawler.output_file'));

        $this->outputFormat = $outputFormat ?? config('laravel-schemacrawler.output_format');
        $this->schemas = config('database.connections.'.$connection.'.database');
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $arguments = [];

        foreach ($this as $key => $value) {
            $arguments[] = '--'.Str::snake($key, '-');
            $arguments[] = $value;
        }

        return $arguments;
    }

    /**
     * @return string
     */
    public function getOutputFile(): string
    {
        return $this->outputFile;
    }
}

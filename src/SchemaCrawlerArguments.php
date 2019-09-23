<?php
/**
 * Created by PhpStorm.
 * User: vernerd
 * Date: 2019-09-23
 * Time: 17:44
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
        $connection = config('database.' . ($connection ?? 'default'));

        $this->user = config('database.connections.' . $connection . '.username');
        $this->password = config('database.connections.' . $connection . '.password');
        $this->infoLevel = $infoLevel ?? 'standard';
        $this->command = $command ?? 'schema';

        $databaseDriver = config('database.connections.' . $connection . '.driver');
        $host = config('database.connections.' . $connection . '.host');
        $port = config('database.connections.' . $connection . '.port');
        $this->url = JDBC::url($databaseDriver, $host, $port);

        $this->outputFile = $outputFile ?? 'schema.pdf';
        $this->outputFormat = $outputFormat ?? 'pdf';
        $this->schemas = config('database.connections.' . $connection . '.database');
    }

    public function toArray()
    {
        $arguments = [];

        foreach ($this as $key => $value) {
            $arguments[] = '--' . Str::snake($key, '-');
            $arguments[] = $value;
        }

        return $arguments;
    }


}
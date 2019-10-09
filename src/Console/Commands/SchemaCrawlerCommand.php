<?php
/**
 * Created by PhpStorm.
 * User: vernerd
 * Date: 2019-09-24
 * Time: 22:30.
 */

namespace DanielWerner\LaravelSchemaCrawler\Console\Commands;

use Illuminate\Console\Command;
use DanielWerner\LaravelSchemaCrawler\Facades\SchemaCrawler;
use DanielWerner\LaravelSchemaCrawler\SchemaCrawlerArguments;

class SchemaCrawlerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schema:generate {--output-file=schema.pdf} {--output-format=pdf} 
                            {--connection=default} {--info-level=standard} {--command=schema}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates diagram from the database';

    public function handle()
    {
        $file = SchemaCrawler::crawl($this->createArgumentsFromOptions());
        $this->line('Generated diagram to '.$file);
    }

    /**
     * @return SchemaCrawlerArguments
     */
    private function createArgumentsFromOptions(): SchemaCrawlerArguments
    {
        return new SchemaCrawlerArguments(
            $this->hasOption('output-file') ? $this->option('output-file') : null,
            $this->hasOption('output-format') ? $this->option('output-format') : null,
            $this->hasOption('connection') ? $this->option('connection') : null,
            $this->hasOption('info-level') ? $this->option('info-level') : null,
            $this->hasOption('command') ? $this->option('command') : null
        );
    }
}

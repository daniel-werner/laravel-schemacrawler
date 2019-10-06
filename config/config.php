<?php

return [

    /*
     * Enable or disable the route registration
     */
    'routes_enabled' => env('SCHEMACRAWLER_ROUTES_ENABLED', true),

    /*
     * The schemacrawler executable to use, on window schemacrawler.cmd can be used
     */
    'schemacrawler_executable' => 'schemacrawler.sh',

    /*
     * Info level for SchemaCrawler, possible values are: detailed, maximum, minimum, standard, unknown
     */
    'info_level' => 'standard',

    /*
     *  The SchemaCrawler command, possible values are: count, details, dump, lint, list, quickdump, schema
     *  For the details see the documentation in the readme.
     */
    'command' => 'schema',

    /*
     * The connection name to use for diagram generation
     */
    'connection' => 'default',

    /*
     * The name of the generated file
     */
    'output_file' => 'schema.pdf',

    /*
     * The output file type, possible values: pdf, png, svg, html
     */
    'output_format' => 'pdf',

    /*
     * The base path to generate the diagram files
     */
    'output_base_path' => storage_path('app'),
];

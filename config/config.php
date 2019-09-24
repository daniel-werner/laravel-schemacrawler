<?php

return [
    'schemacrawler_executable' => 'schemacrawler.sh',

    'info_level' => 'standard',
    'command' => 'schema',
    'connection' => 'default',
    'output_file' => storage_path('app/schema.pdf'),
    'output_format' => 'pdf'
];
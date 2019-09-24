<?php

return [
    'schemacrawler_executable' => 'schemacrawler.sh',

    'info_level' => 'standard',
    'command' => 'schema',
    'connection' => 'default',
    'output_file' => 'schema.pdf',
    'output_format' => 'pdf',
    'output_base_path' => storage_path('app')
];
<?php
return [
    'connection' => env('NEO4J_CONNECTION', 'http'),
    'host'       => env('NEO4J_HOST', '127.0.0.1'),
    'port'       => env('NEO4J_PORT', '7474'),
    'username'   => env('NEO4J_USERNAME', 'neo4j'),
    'password'   => env('NEO4J_PASSWORD', 'neo4j')
];

<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Neo4jOgm
 * @package App\Facades
 * getRepository()
 */
class Neo4jOgm extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'neo4j.ogm';
    }
}

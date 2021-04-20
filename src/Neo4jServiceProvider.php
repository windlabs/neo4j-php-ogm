<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GraphAware\Neo4j\OGM\EntityManager;
use GraphAware\Neo4j\Client\ClientBuilder;

class Neo4jServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->registerPublishing();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->singleton('neo4j.ogm', function () {

            $cypherDsn = sprintf('%s://%s:%s@%s:%s', config('neo4j.connection'),config('neo4j.username'),
                config('neo4j.password'),config('neo4j.host'),config('neo4j.port'));

            return EntityManager::create($cypherDsn);

        });

//        $this->app->singleton('neo4j.client', function () {
//            $cypherDsn = sprintf('http://%s:%s@%s:%s', config('neo4j.username'),
//                config('neo4j.password'),config('neo4j.host'),config('neo4j.port'));
//
//            return ClientBuilder::create()
//                ->addConnection('default', $cypherDsn)
//                ->build();
//
//        });
//
//        $this->app->singleton('neo4j.bolt', function () {
//            $cypherDsn = sprintf('bolt://%s:%s@%s', config('neo4j.username'),
//                config('neo4j.password'),config('neo4j.host'));
//
//            return ClientBuilder::create()
//                ->addConnection('bolt', $cypherDsn)
//                ->build();
//
//        });
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__.'/../config' => config_path()], 'graphaware-neo4j-config');
            $this->publishes([__DIR__.'/../facades' => base_path()], 'graphaware-neo4j-config');
        }
    }
}

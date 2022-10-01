<?php

namespace App\Providers;

use App\Repositories\Student\StudentInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Student\Eloquent\StudentRepo as EloquentRepo;
use App\Repositories\Student\Cypher\StudentRepo as CypherRepo;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind(StudentInterface::class, EloquentRepo::class);
        //$this->app->bind(StudentInterface::class, CypherRepo::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

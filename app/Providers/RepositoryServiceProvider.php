<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Student\Eloquent\StudentRepo as EloquentRepo;
use App\Repositories\Student\Cypher\StudentRepo as CypherRepo;
use App\Repositories\Student\StudentRepoInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind(StudentRepoInterface::class, EloquentRepo::class);
        //$this->app->bind(StudentRepoInterface::class, CypherRepo::class);
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

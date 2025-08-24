<?php

namespace App\Providers;

use App\Repositories\Contracts;
use App\Repositories\Eloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    public array $bindings = [
        Contracts\CategoryRepositoryContract::class => Eloquent\CategoryRepository::class,
    ];
}

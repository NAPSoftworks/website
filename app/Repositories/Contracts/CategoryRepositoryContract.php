<?php

namespace App\Repositories\Contracts;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;

interface CategoryRepositoryContract extends AbstractRepositoryContract
{
    /**
     * @param mixed $id
     * @return mixed
     */
    public function findWithProducts(mixed $id): ?Category;

    /**
     * @param int $limit
     * @param int $offset
     * @return \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category>
     */
    public function getWithProducts(int $limit = 10, int $offset = 0): EloquentCollection;
}

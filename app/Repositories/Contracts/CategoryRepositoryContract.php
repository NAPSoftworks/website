<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;

interface CategoryRepositoryContract extends AbstractRepositoryContract
{
    /**
     * @param mixed $id
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function findWithProducts(mixed $id): ?Model;

    /**
     * @param int $limit
     * @param int $offset
     * @return \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category>
     */
    public function getWithProducts(int $limit = 10, int $offset = 0): EloquentCollection;
}
